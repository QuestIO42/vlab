<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab. Remoto de Embarcados - Câmera</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      * {
        box-sizing: border-box;
      }
  
      html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: var(--fonte, sans-serif);
        background-image: url('./assets/grid.svg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        font-family: var(--fonte);
      }

      .content {
         width: 100%;
         max-width: 664px; 
         display: flex;
         flex-direction: column;
         margin-bottom: 8px;
      }
      
      .content h2 {
         width: fit-content;
         padding: 8px 16px;
         color: #bab1fc; 
         background-color: #5a4ac2;
         box-shadow: 0 0 0 0px #FFFFFF, 6px 6px #3E347B;
      }
  
      .frame-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100vh; 
        gap: 64px;
        padding: 16px; 
      }
  
      iframe {
         width: 100%;
         height: 100%;
         border: none;
      }

      .iframe-wrapper {
         display: flex;
         align-items: center;
         justify-content: center;
         width: 100%;
         height: 504px;
         padding: 12px;
         background-color: #DDDDDD;
         box-shadow: 0 0 0 0px #FFFFFF, 8px 8px #BBBBBB;;
      }
  
      @media (max-width: 1200px) {
        .frame-container {
          flex-direction: column;
          height: auto; 
          gap: 48px;
        }
      }
    </style>
</head>
<body>
    <div class="frame-container">
      <div class="content">
         <h2> VGA </h2>
         <div class="iframe-wrapper">
            <iframe src="https://cam1.vlab.dc.ufscar.br/" title="Câmera 1"></iframe>
         </div>
      </div>

      <div class="content">
         <h2> DE-10 Standard </h2>
         <div class="iframe-wrapper">
            <iframe src="https://cam2.vlab.dc.ufscar.br/" title="Câmera 2"></iframe>
         </div>
      </div>
    </div>


<?php
class ExecutionQueue {
    private $queueFile = 'queue.json';
    private $executionTimeout = 300; // 5 minutes in seconds
    private $processedTimeout = 604800; // 1 week in seconds
    
    public function __construct() {
        if (!file_exists($this->queueFile)) {
            file_put_contents($this->queueFile, json_encode([]));
        }
    }
    
    private function loadQueue() {
        $queue = [];

        if (!file_exists($this->queueFile)) {
            return $queue;
        }

        $fp = fopen($this->queueFile, 'r');
        if (flock($fp, LOCK_SH)) { // LOCK_SH: shared lock
            $data = stream_get_contents($fp);
            flock($fp, LOCK_UN);
            $queue = json_decode($data, true) ?: [];
        }
        fclose($fp);

        return $queue;
    }
    
    private function saveQueue($queue) {
        $fp = fopen($this->queueFile, 'c+'); // cria se não existir
        if (flock($fp, LOCK_EX)) { // LOCK_EX: exclusive lock
            ftruncate($fp, 0); // limpa o conteúdo
            rewind($fp);       // volta ao início
            fwrite($fp, json_encode($queue, JSON_PRETTY_PRINT));
            fflush($fp);       // força escrita em disco
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }
    
    public function addFile($filename) {
        $queue = $this->loadQueue();
        
        $fullpath = "/home/vlab/gowin/src/" . $filename;
        // Check if file exists in the filesystem
        if (!file_exists($fullpath)) {
            echo "File does not exist: " . htmlspecialchars($fullpath);
            return false; // File does not exist
        }
        
        // Check if file already exists in queue
        foreach ($queue as $item) {
            if ($item['filename'] === $filename) {
                return false; // File already in queue
            }
        }
        
        $newItem = [
            'filename' => $filename,
            'status' => 'waiting',
            'submitted_at' => time(),
            'started_at' => null,
            'completed_at' => null
        ];
        
        // If queue is empty, start execution immediately
        if (empty($queue) || !$this->hasRunningProcess($queue)) {
            $newItem['status'] = 'executing';
            $newItem['started_at'] = time();
            $this->moveQueue($filename);
        }
        
        $queue[] = $newItem;
        $this->saveQueue($queue);
        return true;
    }
    
    private function hasRunningProcess($queue) {
        foreach ($queue as $item) {
            if ($item['status'] === 'executing') {
                return true;
            }
        }
        return false;
    }
    
    public function updateQueue() {
        $queue = $this->loadQueue();
        $updated = false;
        $indexesToRemove = [];
        foreach ($queue as $index => &$item) {
            // Check for timed out executions
            if ($item['status'] === 'executing' && 
                $item['started_at'] && 
                (time() - $item['started_at']) > $this->executionTimeout) {
                
                $item['status'] = 'processed';
                $item['completed_at'] = time();
                $updated = true;
            }

            if ($item['status'] === 'processed' && 
               $item['completed_at'] && 
               (time() - $item['completed_at']) > $this->processedTimeout) {
               $indexesToRemove[] = $index;
               $updated = true;
            }
        }
        foreach ($indexesToRemove as $index) {
            unset($queue[$index]);
        }
        
        // Start next item if no execution is running
        if (!$this->hasRunningProcess($queue)) {
            foreach ($queue as &$item) {
                if ($item['status'] === 'waiting') {
                    $item['status'] = 'executing';
                    $item['started_at'] = time();
                    $updated = true;
                    $this->moveQueue($item['filename']);
                    break;
                }
            }
        }
        
        if ($updated) {
            $this->saveQueue(array_values($queue));
        }
        
        return $queue;
    }
    
    public function getQueueByStatus() {
        $queue = $this->updateQueue();
        $result = [
            'processed' => [],
            'executing' => [],
            'waiting' => []
        ];
        
        foreach ($queue as $item) {
            if ($item['status'] === 'processed') {
                $result['processed'][] = $item;
            } elseif ($item['status'] === 'executing') {
                $result['executing'][] = $item;
            } else {
                $result['waiting'][] = $item;
            }
        }
        
        return $result;
    }
    
    public function moveQueue($filename) {
      $cmd = "mosquitto_pub -h 'localhost' -t 'gowin' -m '$filename'";
      $cwd = '/tmp';
      $descriptorspec = array(
         0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
         1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
         2 => array("pipe", "w")    // stderr is a pipe that the child will write to
      );
      flush();
      $process = proc_open($cmd, $descriptorspec, $pipes, $cwd, array());
    }
}

$queueManager = new ExecutionQueue();

// Handle GET parameters
if (isset($_GET['filename']) && !empty($_GET['filename'])) {
    $filename = basename($_GET['filename']);
    if ($queueManager->addFile($filename)) {
        $message = "File '$filename' added to queue successfully.";
    } else {
        $message = "File '$filename' is already in the queue.";
    }
}

$queueData = $queueManager->getQueueByStatus();

function formatTime($timestamp) {
    return $timestamp ? date('Y-m-d H:i:s', $timestamp) : 'N/A';
}

?>
            
    <h2>Currently Executing (<?php echo count($queueData['executing']); ?>)</h2>
    <?php if (empty($queueData['executing'])): ?>
        <p>No files currently executing</p>
    <?php else: ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>Filename</th>
                <th>Started At</th>
            </tr>
            <?php foreach ($queueData['executing'] as $file): ?>
                <tr>
                    <td><?php echo htmlspecialchars($file['filename']); ?></td>
                    <td><?php echo formatTime($file['started_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
        
    <h2>Waiting Queue (<?php echo count($queueData['waiting']); ?>)</h2>
    <?php if (empty($queueData['waiting'])): ?>
        <p>No files waiting in queue</p>
    <?php else: ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>Position</th>
                <th>Filename</th>
                <th>Submitted At</th>
            </tr>
            <?php foreach ($queueData['waiting'] as $index => $file): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($file['filename']); ?></td>
                    <td><?php echo formatTime($file['submitted_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
        
    <h2>Processed Files (<?php echo count($queueData['processed']); ?>)</h2>
    
    <?php if (empty($queueData['processed'])): ?>
        <p>No processed files</p>
    <?php else: ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>Filename</th>
                <th>Submitted At</th>
                <th>Started At</th>
                <th>Completed At</th>
            </tr>
            <?php foreach ($queueData['processed'] as $file): ?>
                <tr>
                    <td><?php echo htmlspecialchars($file['filename']); ?></td>
                    <td><?php echo formatTime($file['submitted_at']); ?></td>
                    <td><?php echo formatTime($file['started_at']); ?></td>
                    <td><?php echo formatTime($file['completed_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    
</body>
</html>
<?php 
/**
 * @author J. Adams
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package FlashMOG
 * @subpackage FlashMOG_Utils
 * @version 0.3
 */

/**
 * Class to handle logging.  Will rotate logs when they
 * reach $max_log_size bytes.
 *
 * @package FlashMOG
 * @subpackage FlashMOG_Utils
 * @version 0.3
 */
class MyLog {
	/**
	 * The path to the directory where log files are written.
	 * Must be writeable by this process.
	 *
	 * This value defaults to NULL.  If you don't bother setting it
	 * to some a file path then no log messages are written. If you do
	 * set it, then log messages will be written to files there and
	 * logs will be rotated as they fill up.
	 * @access private
	 * @var string
	 */
	private $log_file_path = NULL;

	/**
	 * A base for the log file's filename.  The log file and all
	 * the old rotate logs will use this string as a basis
	 * for the filenames
	 * @access private
	 * @var string
	 */
	private $log_file_base = 'MyLog';

	/**
	 * The path to the current log file.
	 *
	 * This value defaults to NULL.  If you don't bother setting it
	 * to some a file path then no log messages are written. 
	 * @access private
	 * @var string
	 */
	private $log_file = NULL;
	
	/**
	 * The log file size limit in bytes.  If a new message will cause the log file to
	 * exceed this length, log files will be rotated and a new log file
	 * will be started.
	 */
	public $max_log_size = 100000;
	
	/**
	 * The number of backup logs to keep as we rotate
	 * logs to prevent gigantic log files.
	 */
	public $backup_logs = 3;
	
	/**
	 * Constructor function
	 *
	 * If either value is null or empty string, no logs will be created or
	 * written.
	 * @access public
	 * @param string $path_arg The directory where log files are to be written.
	 * Must be writable by this process.
	 * @param string $base_name The base used to generate a filename for the log
	 * and any old rotated logs.
	 * @return void
	 */
	public function __construct($path_arg=NULL, $base_arg=NULL) {
		if (is_null($path_arg) || ($path_arg === '')) {
			return;
		}
		if (is_null($base_arg) || ($base_arg === '')) {
			return;
		}

		$path = realpath($path_arg);
		// make sure the dir is writable		
		if (!is_dir($path) || !is_writable($path)) {
			throw new Exception('MyLog constructor failed.  Path ' . $path . ' is not writable.');
		}
		
		$this->log_file_path = $path;
		$this->log_file_base = $base_arg;
		
		// make sure there isn't already a non-writable file with our filename
		$this->log_file = $this->get_log_file_name();
		
		if (file_exists($this->log_file) && !is_writable($this->log_file)) {
			throw new Exception('MyLog constructor failed.  File ' . $this->log_file . ' already exists and is not writable.');
		}
	}
	
	/**
	 * A function to generate the complete filename from the base and a
	 * log rotation number.
	 * @access private
	 * @param int $log_number If you provide this value, a number will be
	 * added.  Useful for rotating logs.
	 */
	private function get_log_file_name($log_number=0) {
		if ($log_number == 0) {
			return $this->log_file_path . DIRECTORY_SEPARATOR . $this->log_file_base . '.log';
		} else {
			return $this->log_file_path . DIRECTORY_SEPARATOR . $this->log_file_base . '.' . trim($log_number) . '.log';
		}
	}
	
	/**
	 * A function to write a log message.
	 *
	 * If log_file is NULL then nothing gets written.
	 * @access private
	 * @param string $msg The message to write to the log file
	 * @return boolean TRUE if a log mesage is written to the log file, FALSE otherwise.
	 * NOTE: That if this FlashMOGLog object was constructed with no path or filename then
	 * it will echo to stdout and return FALSE
	 */
	public function write($msg) {
		if (is_null($this->log_file)) {
			echo $msg . "\n";
			return FALSE;
		}
		
		$msg_length = strlen($msg) + 1;
		
		// sanity check...don't want to go writing huge files
		if ($msg_length > $this->max_log_size) {
			throw new Exception('MyLog::write failed.  A single message was written that exceeds the maximum log size of ' . $this->max_log_size);
			return FALSE;
		}
		
		// check if we will pass the max log size.  if so, rotate logs
		if (file_exists($this->log_file)) {
			if ((filesize($this->log_file) + strlen($msg) + 1) > $this->max_log_size) {
				$this->rotate_logs();
			}
		}
		
		// write the log
		$result = file_put_contents($this->log_file, $msg . "\n", FILE_APPEND | LOCK_EX);
		if ($result === FAlSE) {
			return FALSE;
		} else {
			return TRUE;
		}
		
	} // write()
	
	/**
	 * This function rotates the logs
	 * @access private
	 * @return void
	 */
	private function rotate_logs() {
		// delete the highest log file if it exists
		$last_log = $this->get_log_file_name($this->backup_logs);
		if (file_exists($last_log)) {
			unlink($last_log);
		}
		
		// rotate the other logs
		for($i=$this->backup_logs; $i>0; $i--) {
			$new_log = $this->get_log_file_name($i);
			$old_log = $this->get_log_file_name($i-1);
			if (file_exists($old_log)) {
				if (!rename($old_log, $new_log)) {
					throw new Exception('MyLog::rotate_logs failed.  Failure renaming ' . $old_log . ' to ' . $new_log . '.');
				}
			}
		}
	} // rotate_logs()

} // class FlashMOGPolicyServer
?>
# tracing_WordPress_php_files
A reverse engineering project that traces file loading in wordpress system.
## There are two classes
1. analyzer
   -It is the start of the project. It will call an object of file_analyzer and then log the next file in the log file
3. file_analyzer
   -It will open the next file, reach each line, and analyzer each line. When the line is a require type statement, it will find out the file name and the absolute path, which will be the next file.

## the analyzer class
1. It contains several global varibales
   The starting file name for tracing, and the log filename for the trace
3. It has two methods
   The run method, which starts the trace.
   The next_file method, which log the next file.

## the file_analyzer class
1. It contains a bunch of global variables
   - $filename - current file name
   - $prefix   - the prefix used in log file. It is in the form of 1.0.1.0.
   - $logFilename - the name of the file for logging the trace
   - $comment   - comment type
   - $cleanLine - the line after remove comments
   - $lineCount - the order number of each line inside the file
   - $linkCount - the order number of each link inside the file
   - $incompleteInstruction - whether the line is an incomplete statement
   - $myFileHanlder -
   - $aline  - the current line under analysis
   - $nextFile - the next file to be analyzed
   - $dbug   - whether the line is a debug statement
   - $t_dbug - whether the line is a toggle of debug
   - $log_dbug - whether the line is a log of a debug
   - $allLinks - the array of all links inside the current file.
   
2. It contains 11 methods
   - read_file()
   - open_file_handler()
   - fetch_lines()
   - remove_comments()
   - is_define_constant()
   - is_global_variable()
   - is_require_statement()
   - get_full_name()
   - next_link()
   - close_file_handler()
   - reset_file()
   

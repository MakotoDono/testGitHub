<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DisplayHook
 *
 * @author jacquesm
 */
class DisplayHook {

    //put your code here
    public function captureOutput() {
        $this->CI = & get_instance();
        $output = $this->CI->output->get_output();
        //echo ENVIRONMENT;
        if (ENVIRONMENT != 'testing') {
            if ( $this->CI->output->enable_profiler) {
                $this->CI->load->library('profiler');

                if (!empty($this->CI->output->_profiler_sections)) {
                    $this->CI->profiler->set_sections($this->CI->output->_profiler_sections);
                }

                // If the output data contains closing </body> and </html> tags
                // we will remove them and add them back after we insert the profile data
                if (preg_match("|</body>.*?</html>|is", $output)) {
                    $output = preg_replace("|</body>.*?</html>|is", '', $output);
                    $output .= $this->CI->profiler->run();
                    $output .= '</body></html>';
                } else {
                    $output .= $this->CI->profiler->run();
                }
            }
            //echo $layout_file;
            echo $output;
        }
    }

}

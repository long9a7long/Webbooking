<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class common {

        public function insert_single_image($img_post_name)
        {
            if(!empty($_FILES[$img_post_name]['name'][0])){

                $upload_conf = array(
                    'upload_path'   => realpath('./uploads/images/'),
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_size'      => '30000',
                    'remove_spaces' => true,
                    );
        
                $this->upload->initialize( $upload_conf );
        
                // Change $_FILES to new vars and loop them
                foreach($_FILES[$img_post_name] as $key=>$val)
                {
                    $i = 1;
                    foreach($val as $v)
                    {
                        $field_name = "file_".$i;
                        $_FILES[$field_name][$key] = $v;
                        $i++;
                    }
                }
                // Unset the useless one ;)
                unset($_FILES[$img_post_name]);
        
                // Put each errors and upload data to an array
                $error = array();
                $success = array();
        
                // main action to upload each file
                foreach($_FILES as $field_name => $file)
                {
                    if ( ! $this->upload->do_upload($field_name))
                    {
                        // if upload fail, grab error
                        $error['upload'][] = $this->upload->display_errors();
                    }
                    else
                    {
                        // otherwise, put the upload datas here.
                        // if you want to use database, put insert query in this loop
        
                        $upload_data = $this->upload->data();
        
                        $hinh[]= $upload_data['file_name'];
        
                        // set the resize config
                        $resize_conf = array(
                            // it's something like "/full/path/to/the/image.jpg" maybe
                            'source_image'  => $upload_data['full_path'],
                            // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                            // or you can use 'create_thumbs' => true option instead
                            'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                            'width'         => 200,
                            'height'        => 160
                            );
        
                        // initializing
                        $this->image_lib->initialize($resize_conf);
        
                        // do it!
                        if ( ! $this->image_lib->resize())
                        {
                            // if got fail.
                            $error['resize'][] = $this->image_lib->display_errors();
                        }
                        else
                        {
                            // otherwise, put each upload data to an array.
                            $success[] = $upload_data;
                        }
        
                    }
        
        
                    // see what we get
                    if(count($error > 0))
                    {
                        $data['error'] = $error;
                    }
                    else
                    {
                        $data['success'] = $upload_data;
                    }
            
                }
                $image = implode(',',$hinh);
        
            }
            else{
                $image = "";
            }
            return $image;
        }
        
        
}
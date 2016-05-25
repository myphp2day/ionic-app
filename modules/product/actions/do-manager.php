<?php

    $upload_path = UPLOAD_PATH . 'product/';

    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0777);
    }

    if (!file_exists($upload_path . 'thumbs/')) {
        mkdir($upload_path . 'thumbs/', 0777);
    }

    if (!file_exists($upload_path . 'medium/')) {
        mkdir($upload_path . 'medium/', 0777);
    }

    $imgurl = (isset($_POST['old_imgurl']) && !empty($_POST['old_imgurl'])) ? $_POST['old_imgurl'] : null;
    if (isset($_FILES['imgurl']['name']) && !empty($_FILES['imgurl']['name'])) {
        if (File::isAllowedType($_FILES['imgurl']['type'])) {
            $imgurl = File::storageName($_FILES['imgurl']['name'], $_FILES['imgurl']['size']);
            if(move_uploaded_file($_FILES['imgurl']['tmp_name'], $upload_path . $imgurl)) {
                chmod($upload_path . $imgurl, 0777);
                createthumb($upload_path . $imgurl, $upload_path . 'thumbs/' . $imgurl, 200, 0, false);
                createthumb($upload_path . $imgurl, $upload_path . 'medium/' . $imgurl, 400, 0, false);
            }
        } else {
            $_SESSION[PF . 'ERROR'] = "wrong file type";
            $imgurl = null;
        }
    }

    if(isset($_POST['action']) && !empty($_POST['action'])){

		if(isset($_POST['action']) && $_POST['action'] == 'add'){

			$product_name=$_POST['product_name'];
			$where_cond = "tinStatus != '2' and strProduct='$product_name'";
			$result = $product_obj->getProductsCount($where_cond);

			if($result!=0) {
				$_SESSION[PF.'MSG'] = "This ".$_POST['product_name']." is already taken!";
				_locate(SITE_URL."product/add");
			}else {

				$insert_data = array(
                    'strProduct' => $_POST['product_name'],
					'txtDescription' => $_POST['content'],
					'strShortDescription' => $_POST['shortcontent'],
					'idCategory' => $_POST['category'],
                    'decPrice' => $_POST['price'],
                    'decCurrentPrice' => $_POST['current_price'],
                    'strImageName' => $imgurl
                );
				$rsData = $product_obj->insertData($insert_data);

				if ($rsData) {
					$_SESSION[PF . 'MSG'] = "<strong>" . $_POST['product_name'] . "</strong> has been successfully Added";
				} else {
					$_SESSION[PF . 'ERROR'] = "Error while inserting data";
				}
			}
		}
		else if(isset($_POST['action']) && $_POST['action'] == 'edit')
		{
			$id = isset($_POST['id']) ? $_POST['id'] : 0;


			$product_name=$_POST['product_name'];
			$where_cond = "tinStatus = '2' and strProduct='$product_name' and id!=".$_POST['id'];
			$result = $product_obj->getProductsCount($where_cond);

			if($result!=0) {
				$_SESSION[PF.'MSG'] = "This ".$_POST['product_name']." is already taken!";
				_locate(SITE_URL."product/edit?id=".$_POST['id']);
			}else {

				$modified = array(
                    'id' => $id,
					'strProduct' => $_POST['product_name'],
					'txtDescription' => $_POST['content'],
					'strShortDescription' => $_POST['shortcontent'],
					'idCategory' => $_POST['category'],
                    'decPrice' => $_POST['price'],
                    'decCurrentPrice' => $_POST['current_price'],
                    'strImageName' => $imgurl
                );
				$rsData = $product_obj->updateData($modified);

				if ($rsData) {
					$_SESSION[PF . 'MSG'] = "<strong>" . $_POST['product_name'] . "</strong> has been successfully Updated";
				} else {
					$_SESSION[PF . 'ERROR'] = "Error while inserting data";
				}
			}
		}
		_locate(SITE_URL."product/list");
    }

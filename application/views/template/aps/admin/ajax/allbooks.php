<?php
		$books=array();
		$i=1;
		foreach ($query as $key=>$val) 
		{
			if($val->gifted=='yes'){ $accession_no=$val->accession_no.'/G'; } else{ $accession_no=$val->accession_no; }
			if($type!='accession')
			{
			$data = array(
				'<input type="checkbox" name="selected[]" value="'.$accession_no.'">',
				$i, 
				$accession_no,
				$val->title,
				$val->author,
				$val->subject,
				$val->pub_yr,
				$val->publisher,
				$val->edition,
				$val->pages,
				$val->location,
				$val->status,
				);
			}
			else
			{
				$data = array(
				$i, 
				$accession_no,
				$val->title,
				$val->author,
				$val->subject,
				$val->pub_yr,
				$val->publisher,
				$val->edition,
				$val->pages,
				$val->location,
				$val->status,
				'<a href="#"><i class="fa fa-pencil"></i></a>
		         <a href="'.admin_url().'library/delete_book/'. $val->book_id.'" onclick="return confirm('."'Are you sure?'".');"><i class="fa fa-trash-o"></i></a>'
		         

				);
			}
			$books['data'][]=$data;
			$i++;
		}
		echo json_encode($books);

		?>
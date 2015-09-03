<?php 

function asset_url()
{
  return base_url().'assets/';
}
function admin_url()
{
  return base_url().'admin/';
}
function get_data($table,$condition,$get,$return){
    $ci=& get_instance();
    $ci->load->database();
    $data=$ci->db->query("select `$return` from $table where `$get`='$condition'");
    return $data->row()->$return;
}
function prepareList(array $items, $pid = 0)
{
    $output = array();

    # loop through the items
    foreach ($items as $item) {

        # Whether the parent_id of the item matches the current $pid
        if ((int) $item['parent'] == $pid) {

            # Call the function recursively, use the item's id as the parent's id
            # The function returns the list of children or an empty array()
            if ($children = prepareList($items, $item['menu_id'])) {

                # Store all children of the current item
                $item['children'] = $children;
            }

            # Fill the output
            $output[] = $item;
        }
    }

    return $output;
}
function categoryList(array $items, $pid = 0)
{
    $output = array();

    # loop through the items
    foreach ($items as $item) {

        # Whether the parent_id of the item matches the current $pid
        if ((int) $item['parent'] == $pid) {

            # Call the function recursively, use the item's id as the parent's id
            # The function returns the list of children or an empty array()
            if ($children = categoryList($items, $item['category_id'])) {

                # Store all children of the current item
                $item['children'] = $children;
            }

            # Fill the output
            $output[] = $item;
        }
    }

    return $output;
}
function courseList(array $items, $pid = 0)
{
    $output = array();

    # loop through the items
    foreach ($items as $item) {

        # Whether the parent_id of the item matches the current $pid
        if ((int) $item['content_id'] == $pid) {

            # Call the function recursively, use the item's id as the parent's id
            # The function returns the list of children or an empty array()
            if ($children = courseList($items, $item['content_id'])) {

                # Store all children of the current item
                $item['children'] = $children;
            }

            # Fill the output
            $output[] = $item;
        }
    }

    return $output;
}

function get_grade($max_marks,$marks){

    $percentage=($marks/$max_marks)*100;
    $grade="";
    if($percentage>=0 && $percentage<=20){ $grade='E2';}
    if($percentage>=21 && $percentage<=32){ $grade='E1';}
    if($percentage>=33 && $percentage<=40){ $grade='D';}
    if($percentage>=41 && $percentage<=50){ $grade='C2';}
    if($percentage>=51 && $percentage<=60){ $grade='C1';}
    if($percentage>=61 && $percentage<=70){ $grade='B2';}
    if($percentage>=71 && $percentage<=80){ $grade='B1';}
    if($percentage>=81 && $percentage<=90){ $grade='A2';}
    if($percentage>=91 && $percentage<=100){ $grade='A1';}
    if($percentage>100){ $grade='N/A';}
    return $grade;

}

function print_pdf($view){

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
echo "as" ;   // we can have any view part here like HTML, PHP etc
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
return $obj_pdf->Output('output.pdf', 'I');
}
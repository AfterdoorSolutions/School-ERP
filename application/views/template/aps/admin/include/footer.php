</div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
             
            <div id="full_details" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                      <h4 class="modal-title">Details</h4>
                  </div>
                  <div id="full_details_body" class="modal-body">...</div>
              </div>
            </div>
        </div>

        
        <script src="<?php echo base_url() ;?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/pace.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/retina.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/jquery.cookies.js"></script>        
        <script src="<?php echo base_url() ;?>/assets/js/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/morris.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/raphael-2.1.0.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/bootstrap-wizard.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/select2.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
        <script src="<?php echo base_url() ;?>/assets/js/jquery.dataTables.min.js"></script> 
        <script src="<?php echo base_url() ;?>/assets/js/dataTables.tableTools.js"></script> 
        <script src="http://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script type="text/javascript">     
                function PrintDiv() {    
                   var divToPrint = document.getElementById('divToPrint');
                   var popupWin = window.open('', '_blank', 'width=650');
                   popupWin.document.open();
                   popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                    popupWin.document.close();
                        }
        </script>
        <script type="text/javascript">     
                function PrintDiv1() {    
                   var divToPrint1 = document.getElementById('divToPrint1');
                   var popupWin = window.open('', '_blank', 'width=650');
                   alert(divToPrint1);
                   popupWin.document.open();
                   //popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><body onload="window.print()">' + divToPrint1.innerHTML + '</html>');
                    popupWin.document.close();
                        }
        </script>
        <script type="application/javascript">
        $(document).ready(function() {
            $('form:first *:input[readonly!="readonly"]:first,form:first *:input[type!="hidden"]:first').focus();
        });
        $( document ).ajaxComplete(function() {
            $('select.form-control').select2();
        });
            $(document).ready(function(){
                // Calculate grade
                $('body').on('change','.cal_grade',function (){
                    var marks=$(this).val();
                    var max_no=$(this).data('maxmarks');
                    var percentage=(marks/max_no)*100;
                    var grade="";
                    if(percentage>=0 && percentage<=20){ grade='E2';}
                    if(percentage>=21 && percentage<=32){ grade='E1';}
                    if(percentage>=33 && percentage<=40){ grade='D';}
                    if(percentage>=41 && percentage<=50){ grade='C2';}
                    if(percentage>=51 && percentage<=60){ grade='C1';}
                    if(percentage>=61 && percentage<=70){ grade='B2';}
                    if(percentage>=71 && percentage<=80){ grade='B1';}
                    if(percentage>=81 && percentage<=90){ grade='A2';}
                    if(percentage>=91 && percentage<=100){ grade='A1';}
                    if(percentage>100){ grade='N/A';}
                    $(this).next('span').html(grade);
                });

                $('body').on('change','.cal_grade',function (){
                  var id= $(this).data('id');
                  var total="0";
                  $.each('.marks_'+id,function(v){
                    //var v= $(this).val();
                    total=parseFloat(total)+parseFloat(v);
                    console.log(total);
                  });
                });

                //cal amount
                $('#discount,#mrp').on('keyup',function(){
                  var mrp=$('#mrp').val();
                  var discount=$('#discount').val();
                  var amount=parseFloat(mrp)*(100-parseFloat(discount))/100;
                  $('#amount').val("Rs. "+amount);
                });

                var loader="<div class='text-center'><img src='<?php echo base_url()."assets/images/loader.gif"; ?>'></div>";
                $('select.form-control').select2();
                $('body').on('click','.check_full_details',function (){
                        var id=$(this).data('id');
                        var type=$(this).data('type');
                        if(type=='employee'){ type='staff';}
                         $('#full_details_body').html(loader);
                       $.ajax({
                            url:'<?php echo base_url(); ?>admin/'+type+'/get_full_details/',
                            type:'get',
                            data:{id:id,type:type},
                            success:function(res)
                            {
                                $('#full_details_body').html(res);
                            }
                            });
                        $('#full_details').modal('show');
                    });

                $('body').on('click','.print_library_card',function (){
                        var adm_number = $('#adm_number').val();
                         $('#show_library_card_l').html(loader);
                       
                       $.ajax({
                            url:'<?php echo base_url(); ?>admin/library/library_card_search/'+adm_number,
                            type:'get',
                            data:{adm_number:adm_number},
                            success:function(res)
                            {
                                $('#show_library_card').append(res);
                                $('#show_library_card_l').html("");
                            }
                            });
                        
                });

                
                $('body').on('click','.assign_class',function (e){
                        e.preventDefault();
                        var id=$(this).data('id');
                         $('#full_details_body').html(loader);
                       $.ajax({
                            url:'<?php echo base_url(); ?>admin/staff/assign_class/'+id,
                            type:'get',
                            data:{id:id},
                            success:function(res)
                            {
                                $('#full_details_body').html(res);
                            }
                            });
                        $('#full_details').modal('show');
                    });


                     $('body').on('click','.assign_class_id',function (e){
                        e.preventDefault();
                        var href=window.location.href;
                        var id=$(this).data('id');
                        var class_id=$('#get_section_class_change').val();
                        var section_id=$('#get_batch_section_change').val();
                        //console.log(href);
                        $.ajax({
                            url:'<?php echo base_url(); ?>admin/staff/assign_class_id/'+id,
                            type:'get',
                            data:{id:id,class_id:class_id ,section_id:section_id},
                            success:function(res)
                            {
                                $('#full_details_body').html("Added succesfully");
                                window.location.href=href;
                            }
                            });
                        
                    });

                     //generate_account_report

                     $('body').on('click','.generate_account_report',function (e){
                        e.preventDefault();
                        var from=$('#from').val();
                        var to=$('#to').val();
                        var report_type=$('#report_type').val();
                        //console.log(href);
                        $.ajax({
                            url:'<?php echo base_url(); ?>admin/accounts/gen_reports',
                            type:'get',
                            data:{from:from,to:to,report_type:report_type},
                            success:function(res)
                            {
                                $('#show_account_report').html(res);
                            }
                            });
                        
                    });

                //books ajax

                /*$('#allbookslist').dataTable( {
                    "ajax": '<?php echo base_url(); ?>admin/library/all_ajax/',
                     "aoColumns": [
                        { "bSearchable": false },
                            null,
                            null,
                            null,
                            null,
                            null,
                            null,
                            null,
                           { "bSearchable": false },
                            null,
                            null,
                            null,
                            ]
                } );*/

                    $('.datepicker').datepicker(
                    {
                        changeYear:true,
                        changeMonth:true,
                        dateFormat: 'mm-dd-yy'
                    });

                    $('.datepicker_my').datepicker(
                    {
                        changeMonth: true,
                        changeYear: true,
                        showButtonPanel: true,
                        dateFormat: 'MM yy',
                        onClose: function(dateText, inst) { 
                            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                            $(this).datepicker('setDate', new Date(year, month, 1));
                        }
                    });

                    $('.datepicker_m').datepicker(
                    {
                        changeMonth: true,
                        showButtonPanel: true,
                        dateFormat: 'MM',
                        onClose: function(dateText, inst) { 
                            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                            $(this).datepicker('setDate', new Date(1,month, 1));
                        }
                    });

                  $('.datepicker_y').datepicker(
                    {
                        changeYear: true,
                        showButtonPanel: true,
                        dateFormat: 'yy',
                        onClose: function(dateText, inst) { 
                            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                            $(this).datepicker('setDate', new Date(year, 1));
                        }
                    });
                //$('#datepicker_m').val((date.getMonth() + 1));
                $('.datepickeronly').datepicker();
                $('#studentlist').DataTable( {
                     aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                    ],
                    iDisplayLength: 50,
                    "ajax": '<?php echo base_url(); ?>admin/student/all_students/',
                    dom: 'T<"clear">lfrtip',
                    tableTools: {
                    "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
                    aButtons: [{
                              "sExtends": "csv",
                              "sButtonText": "CSV",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                               },
                              {
                              "sExtends": "pdf",
                              "sButtonText": "PDF",
                              "sPdfOrientation": "landscape",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "copy",
                              "sButtonText": "Copy",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "print",
                              "sButtonText": "Print",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                }
                          ]
                }

                });
                $('#class_studentlist').DataTable( {
                     aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                    ],
                    iDisplayLength: 50,
                    "ajax": '<?php echo base_url(); ?>admin/student/class_students/',
                    dom: 'T<"clear">lfrtip',
                    tableTools: {
                    "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
                    aButtons: [{
                              "sExtends": "csv",
                              "sButtonText": "CSV",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                               },
                              {
                              "sExtends": "pdf",
                              "sButtonText": "PDF",
                              "sPdfOrientation": "landscape",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "copy",
                              "sButtonText": "Copy",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "print",
                              "sButtonText": "Print",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                }
                          ]
                }

                });
                 $('#allbookslist').DataTable( {
                     aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                    ],
                    iDisplayLength: 50,
                    "ajax": '<?php echo base_url(); ?>admin/library/all_ajax/accession',
                     "aoColumns": [
                        { "bSearchable": false },
                            null,
                            null,
                            null,
                            null,
                            null,
                            null,
                            null,
                           { "bSearchable": false },
                            null,
                            null,
                            null,
                            ],
                    dom: 'T<"clear">lfrtip',
                    tableTools: {
                    "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
                    aButtons: [{
                              "sExtends": "csv",
                              "sButtonText": "CSV",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                               },
                              {
                              "sExtends": "pdf",
                              "sButtonText": "PDF",
                              "sPdfOrientation": "landscape",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "copy",
                              "sButtonText": "Copy",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "print",
                              "sButtonText": "Print",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                }
                          ]
                }

                });

                $('#allbookslistreverted').DataTable( {
                     aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                    ],
                    iDisplayLength: 50,
                    "ajax": '<?php echo base_url(); ?>admin/library/all_ajax/timestamp',
                     "aoColumns": [
                        { "bSearchable": false },
                            null,
                            null,
                            null,
                            null,
                            null,
                            null,
                            null,
                           { "bSearchable": false },
                            null,
                            null,
                            null,
                            ],
                    dom: 'T<"clear">lfrtip',
                    tableTools: {
                    "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
                    aButtons: [{
                              "sExtends": "csv",
                              "sButtonText": "CSV",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                               },
                              {
                              "sExtends": "pdf",
                              "sButtonText": "PDF",
                              "sPdfOrientation": "landscape",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "copy",
                              "sButtonText": "Copy",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                },
                                {
                              "sExtends": "print",
                              "sButtonText": "Print",
                              "mColumns": function ( dtSettings ) {
                                   var api = new $.fn.dataTable.Api( dtSettings );

                                   return api.columns(":not(:last)").indexes().toArray();
                                    }
                                }
                          ]
                }

                });
                //$('input').attr('autocomplete','off');

                //Section Selected
                $('body').on('change','#get_section_class_change',function (){
                    var class_id=$(this).val();
                    $('.show_sections_class_change').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/section/sections_a/',
                    type:'get',
                    data:{class_id:class_id},
                    success:function(res)
                    {
                        $('.show_sections_class_change').html(res);
                    }
                    });
                }); 

                //SAVE STUDENT MARKS
                $('body').on('click','.save_marks',function (){
                    var student_id=$(this).data('studentid');
                    var marks=$('#marks_'+student_id).val();
                    var exam_marking_id=$(this).data('examid');
                    $.ajax({
                    url:'<?php echo admin_url(); ?>fa/add_stu_marks/',
                    type:'get',
                    context:$(this),
                    data:{student_id:student_id,marks:marks,exam_marking_id:exam_marking_id},
                    success:function(res)
                    {
                        $(this).html("<i class='fa fa-pencil'></i>");
                    }
                    });
                }); 

                //Batch Selected
                $('body').on('change','#get_batch_section_change',function (){
                    var section_id=$(this).val();
                    $('.show_batch_section_change').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/section/batch_a/',
                    type:'get',
                    data:{section_id:section_id},
                    success:function(res)
                    {
                        $('.show_batch_section_change').html(res);
                    }
                    });
                }); 

                //Batch Selected and get subject
                $('body').on('change','.get_sub #batch_id',function (e){
                    e.preventDefault();
                    var section_id=$('#get_batch_section_change').val();
                    var batch_id=$(this).val();
                    var class_id=$('#get_section_class_change').val();
                    $('.show_subject_section_change').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/section/subject/',
                    type:'get',
                    data:{section_id:section_id,batch_id:batch_id,class_id:class_id},
                    success:function(res)
                    {
                        $('.show_subject_section_change').html(res);
                    }
                    });
                }); 

                //show edition data through ajax
                /*$('body').on('click','#get_edition_field_ajax',function(){
                    var subscription_id=$('#subscription_id').val();
                    $('#show_edition_ajax').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url();?>library/edition_data_ajax',
                    type:'get',
                    data:{subscription_id:subscription_id},
                    success:function(res)
                    {
                        $('#show_edition_ajax').html(res);
                    }
                    });
                });*/

                //get subscription year through magazine
                $('body').on('change','#magazine_id',function(){
                    var magazine_id=$(this).val();
                    $('#show_subscription_year').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url();?>library/subscription_year_ajax',
                    type:'get',
                    data:{magazine_id:magazine_id},
                    success:function(res)
                    {
                        $('#show_subscription_year').html(res);
                    }
                    });
                });

                //Class Selected and get subject by academic year
                $('body').on('change','.class_ac#get_section_class_change',function (e){
                   // e.preventDefault();
                    var batch_id=$('#batch_id_2').val();
                    var class_id=$(this).val();
                    $('.show_sections_class_change_2').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url(); ?>section/section_2/',
                    type:'get',
                    data:{batch_id:batch_id,class_id:class_id},
                    success:function(res)
                    {
                        $('.show_sections_class_change_2').html(res);
                        //$('select').select2();
                    }
                    });
                });

                $('body').on('change','#batch_id_2',function(){
                    $('#get_section_class_change').val('');
                });

                //GET SUGGESTION BOX
                var title=function t_suggest(value,what,table){
                    var request=$.ajax({
                        url:'<?php echo admin_url(); ?>library/title_suggestion_ajax',
                        type:'get',
                        data:{value:value,what:what,table:table},
                        dataType:"json",
                        success:function(res)
                        {
                            //thisone.siblings('.suggestion_result').html(res);
                           // console.log(res);
                           var availableTags = res;
                           console.log(availableTags);
                           $(".title_suggest").autocomplete({
                            source: availableTags
                          });
                        }
                    });
                    return request;
                };
                var request = false;
                $('body').on('keyup','.title_suggest',function(){
                    if(request && request.readyState!==4){
                        request.abort();
                    }
                    var value=$(this).val();
                    var what=$(this).data('what');
                    var table=$(this).data('table');
                    //$(this).siblings('.suggestion_result').show();
                    //$(this).siblings('.suggestion_result').html(loader);
                    
                    request=title(value,what,table);
                });

                
                /*$('body').on('click','.click_list li',function(e){
                    e.preventDefault();
                    var html=$(this).html();
                    $(this).parents('ul.click_list').parents('.suggestion_result').siblings('.title_suggest').val(html);
                    $('.suggestion_result').hide();
                });*/

                //Student Selected
                $('body').on('change','#batch_id',function (){
                    var class_id=$('#get_section_class_change').val();
                    var batch_id=$(this).val();
                    var section_id=$('#get_batch_section_change').val();
                    $('.show_get_student').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/fee/student_a',
                    type:'get',
                    data:{class_id:class_id,batch_id:batch_id,section_id:section_id},
                    success:function(res)
                    {
                        $('.show_get_student').html(res);
                    }
                    });
                });

                //Change href by selecting name
                $('body').on('change','#change_href_by_id',function (){
                    var student_admission_id=$(this).val();
                    var href=$('#print').attr('href');
                    $('#print').attr('href',href+student_admission_id);
                });

                //Get data through admission
                $('body').on('change','#change_href_by_adm_no',function (){
                    var adm_no=$(this).val();
                    var href=$('#print_f').attr('href');
                    $('#print_f').attr('href',href+adm_no);
                });

                //Book  Selected
                $('body').on('click','#get_book',function (e){
                    e.preventDefault();
                    var book_id=$('#book').val();
                    $('.show_book').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/library/book_a',
                    type:'get',
                    data:{book_id:book_id},
                    success:function(res)
                    {
                        $('.show_book').html(res);
                    }
                    });
                }); 

                //retrun book
                $('body').on('click','#return_get_book',function (e){
                    e.preventDefault();
                    var book_id=$('#book').val();
                    $('.show_book').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/library/returnbook/'+book_id,
                    type:'get',
                    data:{book_id:book_id},
                    success:function(res)
                    {
                        $('.show_book').html(res);
                    }
                    });
                }); 

                //return book insert
                $('body').on('click','.return_book_insert',function (e){
                    e.preventDefault();
                    var issue_id=$(this).data('issueid');
                    var fine=$(this).data('fine');
                    var student_id=$(this).data('studentid');
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/library/returnbookinsert/',
                    type:'get',
                    context:$(this),
                    data:{issue_id:issue_id,fine:fine,student_id:student_id},
                    success:function(res)
                    {
                        $(this).parents('.return_book_insert_show').html(res);
                    }
                    });
                }); 
            
                //Issue  book
                $('body').on('click','#get_student_status',function (e){
                    e.preventDefault();
                    var book_id=$('#book').val();
                    $('.show_book').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url(); ?>library/book_a',
                    type:'get',
                    data:{book_id:book_id},
                    success:function(res)
                    {
                        $('.show_book').html(res);
                    }
                    });
                });

              

                //Fee Registration
                $('body').on('click','#registration',function (e){
                    e.preventDefault();
                    var student_admission_id=$('#registration1').val();
                    $('.show_fee_register').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url(); ?>student/fee_register',
                    type:'get',
                    data:{student_admission_id:student_admission_id},
                    success:function(res)
                    {
                        $('.show_fee_register').html(res);
                    }
                    });
                }); 
                
                //Search Fine
                $('body').on('change','#status',function (e){
                    e.preventDefault();
                    var adm_no=$('#adm_no').val();
                    var status=$(this).val();
                    var url='';
                    if(status<2){
                        url='search_fine_ajax';
                    }
                    else
                    {
                        url='search_book_ajax';
                    }
                    $('.show_student_fine').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url(); ?>library/'+url,
                    type:'get',
                    data:{adm_no:adm_no,status:status},
                    success:function(res)
                    {
                        $('.show_student_fine').html(res);
                    }
                    });
                    $(this).val('');
                }); 

              //Generate Overall Marks Report
              $('body').on('click','.generate_report',function(){
                  var batch_id=$('#batch_id_2').val();
                  var class_id=$('#get_section_class_change').val();
                  var section_id=$('#get_batch_section_change').val();
                  var exam_type_id=$('#exam_type_id').val();
                  $('#show_report').html(loader);
                  $.ajax({
                    url:'<?php echo admin_url();?>fa/generate_report_ajax',
                    type:'get',
                    data:{batch_id:batch_id,class_id:class_id,section_id:section_id,exam_type_id:exam_type_id},
                    success:function(res)
                    {
                      $('#show_report').html(res);
                    }
                  });
                });

              $('body').on('click','.generate_analysis',function(){
                  var batch_id=$('#batch_id_2').val();
                  var class_id=$('#get_section_class_change').val();
                  var section_id=$('#get_batch_section_change').val();
                  var exam_type_id=$('#exam_type_id').val();
                  $('#show_report').html(loader);
                  $.ajax({
                    url:'<?php echo admin_url();?>fa/generate_analysis_ajax',
                    type:'get',
                    data:{batch_id:batch_id,class_id:class_id,section_id:section_id,exam_type_id:exam_type_id},
                    success:function(res)
                    {
                      $('#show_report').html(res);
                    }
                  });
                });

               
              //Student or staff for library

                $('body').on('click','#get_student',function (e){
                    e.preventDefault();
                    var student_id=$('#student').val();
                    var issue_to=$("input[name='issue_to']:checked").val();
                    $('.student_name').html(loader);
                    $.ajax({
                    url:'<?php echo admin_url(); ?>library/issue_search',
                    type:'get',
                    data:{student_id:student_id,issue_to:issue_to},
                    success:function(res)
                    {
                        $('.student_name').html(res);
                    }
                    });
                });

                $('body').on('click','.student_book_issue',function (e){
                    e.preventDefault();
                    $('#adm_number').val($(this).data('admno'));
                    $('#name').val($(this).data('name'));
                    $('#issue_to_id').val($(this).data('id'));
                    console.log($(this).data('issueto'));
                    $('#issue_to_selected').val($(this).data('issueto'));

                }); 
              //reissued book
              $('body').on('click','.student_book_issue',function (e){
                    e.preventDefault();
                    var student_id=$(this).data('studentid');
                    var issue_to=$(this).data('issueto');
                    var adm_number=$(this).data('admno');
                    
                    $.ajax({
                    url:'<?php echo admin_url(); ?>library/reissue_book',
                    type:'get',
                    data:{student_id:student_id,issue_to:issue_to,adm_number:adm_number},
                    success:function(res)
                    {
                        $('.student_book_issue').html(res);
                    }
                    });
                }); 
                //Admission Number load
                /*$('body').on('change','#student_adm',function (){
                    var student_admission_id=$(this).val();
                    $('.show_stu_no').html(loader);
                    $.ajax({
                    url:'<?php echo base_url(); ?>admin/fee/adm_a',
                    type:'get',
                    data:{student_admission_id:student_admission_id},
                    success:function(res)
                    {
                        $('.show_stu_no').html(res);
                    }
                    });
                }); 
*/


                //SALARY ELEMENT JQUERY
                $('.select_type').click(function(){
                    var val=$(this).val();
                    if(val=='percentage'){
                        $('.pp_of').show();
                    }
                    else{
                        $('.pp_of').hide();
                    }
                });

                //ON PAGE LOAD CALCUALTE SALARY
                var salary_elem_sum='0';
                $('.salary_elem_sum').each(function() {
                        var action=$(this).data('action');
                        //console.log(action);
                        if(action=='add'){
                            salary_elem_sum=parseFloat(salary_elem_sum)+parseFloat($(this).val());
                        }
                        else{
                            salary_elem_sum=parseFloat(salary_elem_sum)-parseFloat($(this).val());
                        }
                });
                $('#salary_elem_sum').val(salary_elem_sum);

                //Generate form 16 for a particular staff
                $('body').on('click','.generate_form16_for_staff',function(){
                    var staff_id=$('#staff_id').val();
                    var year_id=$('#batch_id').val();
                    $('#show_form16').html(loader);
                    $.ajax({
                        url:'<?php echo admin_url(); ?>staff/get_form16',
                        type:'get',
                        data:{staff_id:staff_id,year_id:year_id},
                        success:function(res){
                            $('#show_form16').html(res);
                            $('.table_input input').addClass('form-control');
                        }
                    });
                });

                //FA SEARCH BOOKS
                $('body').on('click','.search_books',function(){
                    var batch_id=$('#batch_id_2').val();
                    var class_id=$('#get_section_class_change').val();
                    var section_id=$('#get_batch_section_change').val();
                    var exam_type_id=$('#exam_type_id').val();

                    $('#result').html(loader);
                    $.ajax({
                        url:'<?php echo admin_url(); ?>fa/all_sub',
                        type:'get',
                        data:{batch_id:batch_id,class_id:class_id,section_id:section_id,exam_type_id:exam_type_id},
                        success:function(res){
                            $('#result').html(res);
                        }

                    });

                });
                //show_sections_class_change_2
                $('body').on('change','.show_sections_class_change_2 #get_batch_section_change',function(){
                    var batch_id=$('#batch_id_2').val();
                    var class_id=$('#get_section_class_change').val();
                    var section_id=$('#get_batch_section_change').val();
                    //var exam_type_id=$('#exam_type_id').val();

                    $('.show_subject_class_change').html(loader);
                    $.ajax({
                        url:'<?php echo admin_url(); ?>fa/get_sub',
                        type:'get',
                        data:{batch_id:batch_id,class_id:class_id,section_id:section_id},
                        success:function(res){
                            $('.show_subject_class_change').html(res);
                        }
                    });

                });
                //FA ADD MARKS
                $('body').on('click','.add_marks',function(){
                    var batch_id=$('#batch_id_2').val();
                    var class_id=$('#get_section_class_change').val();
                    var section_id=$('#get_batch_section_change').val();
                    var exam_type_id=$('#exam_type_id').val();
                    var exam_marking_id=$(this).data('exam-marking-id');
                    var subject_id=$(this).data('subject-id');

                    $('#result').html(loader);
                    $.ajax({
                        url:'<?php echo admin_url(); ?>fa/add_sub_marks',
                        type:'get',
                        data:{exam_marking_id:exam_marking_id,subject_id:subject_id,batch_id:batch_id,class_id:class_id,section_id:section_id,exam_type_id:exam_type_id},
                        success:function(res){
                            $('#result').html(res);
                        }
                    });
                });
                //FA Submit MARKS
                $('body').on('click','.submit_marks',function(){
                    var batch_id=$('#batch_id_2').val();
                    var class_id=$('#get_section_class_change').val();
                    var section_id=$('#get_batch_section_change').val();
                    var exam_type_id=$('#exam_type_id').val();
                    var subject_id=$(this).data('subject-id');

                    $('#result').html(loader);
                    $.ajax({
                        url:'<?php echo admin_url(); ?>fa/submit_marks',
                        type:'get',
                        data:{subject_id:subject_id,batch_id:batch_id,class_id:class_id,section_id:section_id,exam_type_id:exam_type_id},
                        success:function(res){
                            $('#result').html(res);
                        }
                    });
                });

                $('body').on('click','.get_student_marks',function(){
                    var batch_id=$('#batch_id_2').val();
                    var class_id=$('#get_section_class_change').val();
                    var section_id=$('#get_batch_section_change').val();
                    var exam_type_id=$('#exam_type_id').val();
                    var subject_id=$('#subject_id').val();

                    $('#result').html(loader);
                    $.ajax({
                        url:'<?php echo admin_url(); ?>fa/get_stu_marks',
                        type:'get',
                        data:{subject_id:subject_id,batch_id:batch_id,class_id:class_id,section_id:section_id,exam_type_id:exam_type_id},
                        success:function(res){
                            $('#result').html(res);
                        }
                    });
                });


                //ON VALUE CHANGE CALCUALTE SALARY
                $('.salary_elem_sum').on('keyup',function(){
                    var salary_elem_sum='0';
                    $('.salary_elem_sum').each(function() {
                        var action=$(this).data('action');
                        //console.log(action);
                        if(action=='add'){
                            salary_elem_sum=parseFloat(salary_elem_sum)+parseFloat($(this).val());
                        }
                        else{
                            salary_elem_sum=parseFloat(salary_elem_sum)-parseFloat($(this).val());
                        }
                    });
                    $('#salary_elem_sum').val(salary_elem_sum);
                });
        }); 

$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        //var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newIn = '<div class="input" id="field' + next + '"><div class="row"><div class="col-md-4"><input type="text" name="sub_name[]" value="" placeholder="Subject Division" class="form-control" ></div><div class="col-md-4"><input type="text" name="sub_marks[]" placeholder="Maximum Marks" value="" class="form-control" ></div><div class="col-md-4"><input type="text" name="sub_dist[]" value="" class="form-control" placeholder="Distribution Percentage`"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});
    </script>
    </body>
</html>
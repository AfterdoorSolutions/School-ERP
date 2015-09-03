<section>
  <div class="mainwrapper">
  <div class="leftpanel">
  <!-- <h5 class="leftpanel-title">Navigation</h5> -->
  <ul class="nav nav-pills nav-stacked">
      <li class="<?php if($this->router->fetch_class()=='dashboard'){ echo "active"; }?>"><a href="<?php echo admin_url(); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      
       <li class="parent <?php if($this->router->fetch_class()=='library'){ echo "active"; }?>"><a href="#"><i class="fa fa-server"></i> <span>Library</span></a>
        <ul class="children"> 
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='issue'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/issue";?>">Issue Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='book'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/book";?>">Add Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all";?>">All Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='return'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/returnbook";?>">Return Book</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='pendingfine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/pendingfine";?>">Pending Fine</a></li>
            <!-- <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='search'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/search";?>">Search Fine</a></li> -->

            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='bookshistory'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/bookshistory";?>">Books History</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='bookshistory'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/search_fine";?>">Student Status</a></li>
            <!-- <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='paidfine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all";?>">Paid Fine</a></li> -->
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='magazine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/magazine";?>">Add Magazine</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_magzine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_magzine";?>">All Magazine</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='subscription'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/subscription";?>">Add Subscription</a></li>
            
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='edition'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/edition";?>">Add Edition</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_edition'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_edition";?>">All Edition</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='newspaper'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/newspaper";?>">Add Newspaper</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_newspaper'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_newspaper";?>">All Newspaper</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='newspaper_detail'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/newspaper_detail";?>">Newspaper Details</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='all_newspaper_detail'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all_newspaper_detail";?>">All Newspaper Detail</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='newspaper_report'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/newspaper_report";?>">Newspaper Report</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='barcode_books'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/barcode_books";?>">Print Barcode Books</a></li>
            <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='barcode'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/barcode";?>">Print Barcode</a></li>

            <!-- <li class="<?php if($this->router->fetch_class()=='library' && $this->router->fetch_method()=='paidfine'){ echo "active"; }?>"><a href="<?php echo admin_url()."library/all";?>">Paid Fine</a></li> -->
        </ul>
      </li>  

      <li><a href="<?php echo admin_url(); ?>setting"><i class="fa fa-gear"></i> <span>Settings</span></a></li>          
      <li><a href="<?php echo admin_url(); ?>logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>          
  </ul>         
</div><!-- leftpanel -->
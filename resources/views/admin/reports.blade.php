@extends('admin.layouts.master')
@section('content')

<div class="container">
         <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper" style="margin-left:0; min-height:0px!important"> -->
  

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
   
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Users</span>
            <span class="info-box-number">900</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Users</span>
            <span class="info-box-number">41,410</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Active Users</span>
            <span class="info-box-number">760</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    {{-- 
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Members</span>
            <span class="info-box-number">2,000</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    --}}
      <!-- /.col -->
    </div>
    <div class="row">
      <div class="box box-solid rounded-0 border-0" style="min-height:30px">
      </div>
    </div>

    <div class="row">
         <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Posts - All </span>
                <span class="info-box-number">5,200</span>
  
                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                      50% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
         </div>
            <!-- /.info-box -->
          <div class="col-md-4">
            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Posts - This Month </span>
                <span class="info-box-number">92,050</span>
  
                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                      20% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
            <!-- /.info-box -->
          <div class="col-md-4">
            <div class="info-box bg-red">
              <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Posts - Today</span>
                <span class="info-box-number">114,381</span>
  
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                      70% Increase from last Weeks Average
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
            <!-- /.info-box -->
           
            <!-- /.info-box -->
        </div>

    </div>
    
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">


        <!-- solid sales graph -->
        <div class="box box-solid ">
          
          <!-- /.box-body -->
          <div class="box-body no-border">
            <div class="row">
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                       data-fgColor="#39CCCC">

                <div class="knob-label">Opinions</div>
              </div>
              <!-- ./col -->
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                       data-fgColor="#39CCCC">

                <div class="knob-label">Complains</div>
              </div>
              <!-- ./col -->
              <div class="col-xs-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                       data-fgColor="#39CCCC">

                <div class="knob-label">Enquiries</div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->

         <!-- Info boxes -->
    </div>
    <!-- /.row -->

    
   

    <div class="row ml-3">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>

            <p>Total Polls</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">60% of users participate<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
 
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>

            <p>Service Requests</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">50%-Ambulance | 50%-Firefighting <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p> Events Posted</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>65</h3>

            <p>News Posts</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
       <!-- ./col -->
    </div>


  </section>

<!-- </div>content wrapper -->

</div>
@endsection
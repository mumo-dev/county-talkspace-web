@extends('admin.layouts.master')
@section('content')

<div class="container">
    <h3 id="header" class="m-0 text-info text-center text-uppercase"></h3>
    <hr class="mt-0">
    <div class="row">
      <div class="col-sm-6">
            <div class="form-group">
                <label class="text-uppercase text-info" style="font-weight:normal">Select Date range to view Reports:</label>

                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                </div>
             </div>
      </div>
  </div>


  <div id="loading" class="text-center d-none">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
  </div>

</div>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Users</span>
            <span class="info-box-number">{{$total_user}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Users</span>
          <span class="info-box-number" id="user_count"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>


        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="ion ion-ios-chatboxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Posts - All </span>
              <span class="info-box-number" id="total_posts"></span>

                {{-- <div class="progress">
                  <div class="progress-bar" style="width: {{$posts_increase}}%"></div>
                </div>
                <span class="progress-description">
                      {{$posts_increase}}% Increase in 30 Days
                    </span> --}}
              </div>
              <!-- /.info-box-content -->
            </div>
         </div>
      <!-- /.col -->

      <!-- /.col -->
    </div>
    <hr>


    {{-- <div class="row">
         <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="ion ion-ios-chatboxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Posts - All </span>
              <span class="info-box-number">{{ $total_posts}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{$posts_increase}}%"></div>
                </div>
                <span class="progress-description">
                      {{$posts_increase}}% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
         </div>
            <!-- /.info-box -->
          <div class="col-md-4">
            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="ion ion-ios-chatboxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Posts - This Month </span>
              <span class="info-box-number">{{ $total_posts_month}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{$posts_increase}}%"></div>
                </div>
                <span class="progress-description">
                    {{$posts_increase}}% Increase in 30 Days
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
            <!-- /.info-box -->
          <div class="col-md-4">
            <div class="info-box bg-red">
              <span class="info-box-icon"><i class="ion ion-ios-chatboxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Posts - Today</span>
                 <span class="info-box-number">{{ $total_posts_today}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{$posts_increase_tday}}%"></div>
                </div>
                <span class="progress-description">
                 {{$posts_increase_tday}}% Increase from last yesterday
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
            <!-- /.info-box -->

            <!-- /.info-box -->
        </div>

    </div> --}}

    {{-- <hr> --}}
    <h4 class="text-center text-info text-uppercase" style="font-weight:">Post Category Percentages and Response Rates</h4>
    <hr>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">


        <!-- solid sales graph -->
        <div class="box box-solid ">

          <!-- /.box-body -->
          <div class="box-body no-border">
            <div class="row">
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" id="opinion" data-readonly="true"  data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="knob-label">Opinions </div>



              </div>
              <!-- ./col -->
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
              <input type="text" class="knob" data-readonly="true" id="complain" data-width="60" data-height="60"
                       data-fgColor="#39CCCC">

                <div class="knob-label">Complains</div>
                Response Rate - 20%
              </div>
              <!-- ./col -->
              <div class="col-xs-4 text-center">
              <input type="text" class="knob" data-readonly="true" id="enquiry" data-width="60" data-height="60"
                       data-fgColor="#39CCCC">

              <div class="knob-label">Enquiries </div>
              Response Rate - 20%
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
             <h3 id="polls"></h3>

            <p>Total Polls</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-stats"></i>
          </div>
            <a href="#" class="small-box-footer"><span id="poll_perc"></span>% of users participate<i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
          <h3 id="services"></h3>

            <p>Service Requests</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-adds"></i>
          </div>
        <a href="#" class="small-box-footer"><span id="amb_perc"></span>%-Ambulance | <span id="fire_perc"></span>%-Firefighting <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
          <h3 id="events"></h3>

            <p> Events Posted</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graphs"></i>
          </div>
          <a href="#" class="small-box-footer"><span class="visibility:hidden">More info</span> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
             <h3 id="news"></h3>

            <p>News Posts</p>
          </div>
          <div class="icon">
            <i class="ion ion-keypad"></i>
          </div>
          <a href="#" class="small-box-footer"><span class="visibility:hidden">More info</span> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
       <!-- ./col -->
    </div>


  </section>

<!-- </div>content wrapper -->

</div>
@endsection

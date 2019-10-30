<template>
  <div class="dashboard">
    <div class="row">
      <div class="col-lg-7">

        <!-- Traffic sources -->
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Traffic sources</h6>
            <div class="heading-elements">
              <form class="heading-form" action="#">
                <div class="form-group">
                  <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                    <input type="checkbox" class="switch" checked="checked">
                    Live update:
                  </label>
                </div>
              </form>
            </div>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-4">
                <ul class="list-inline text-center">
                  <li>
                    <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                  </li>
                  <li class="text-left">
                    <div class="text-semibold">New visitors</div>
                    <div class="text-muted">2,349 avg</div>
                  </li>
                </ul>

                <div class="col-lg-10 col-lg-offset-1">
                  <div class="content-group" id="new-visitors"></div>
                </div>
              </div>

              <div class="col-lg-4">
                <ul class="list-inline text-center">
                  <li>
                    <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                  </li>
                  <li class="text-left">
                    <div class="text-semibold">New sessions</div>
                    <div class="text-muted">08:20 avg</div>
                  </li>
                </ul>

                <div class="col-lg-10 col-lg-offset-1">
                  <div class="content-group" id="new-sessions"></div>
                </div>
              </div>

              <div class="col-lg-4">
                <ul class="list-inline text-center">
                  <li>
                    <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                  </li>
                  <li class="text-left">
                    <div class="text-semibold">Total online</div>
                    <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                  </li>
                </ul>

                <div class="col-lg-10 col-lg-offset-1">
                  <div class="content-group" id="total-online"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="position-relative" id="traffic-sources"></div>
        </div>
        <!-- /traffic sources -->

      </div>

      <div class="col-lg-5">

        <!-- Sales stats -->
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Sales statistics</h6>
            <div class="heading-elements">
              <form class="heading-form" action="#">
                <div class="form-group">
                  <select class="change-date select-sm" id="select_date">
                    <optgroup label="<i class='icon-watch pull-right'></i> Time period">
                      <option value="val1">June, 29 - July, 5</option>
                      <option value="val2">June, 22 - June 28</option>
                      <option value="val3" selected="selected">June, 15 - June, 21</option>
                      <option value="val4">June, 8 - June, 14</option>
                    </optgroup>
                  </select>
                </div>
              </form>
                    </div>
          </div>

          <div class="container-fluid">
            <div class="row text-center">
              <div class="col-md-4">
                <div class="content-group">
                  <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 5,689</h5>
                  <span class="text-muted text-size-small">orders weekly</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="content-group">
                  <h5 class="text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> 32,568</h5>
                  <span class="text-muted text-size-small">orders monthly</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="content-group">
                  <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> $23,464</h5>
                  <span class="text-muted text-size-small">average revenue</span>
                </div>
              </div>
            </div>
          </div>

          <div class="content-group-sm" id="app_sales"></div>
          <div id="monthly-sales-stats"></div>
        </div>
        <!-- /sales stats -->

      </div>
    </div>


    <div class="row">
      <div class="col-lg-8">

        <!-- Marketing campaigns -->
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Marketing campaigns</h6>
            <div class="heading-elements">
              <span class="label bg-success heading-text">28 active</span>
              <ul class="icons-list">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                  </ul>
                        </li>
                      </ul>
                    </div>
          </div>

          <div class="table-responsive">
            <table class="table table-lg text-nowrap">
              <tbody>
                <tr>
                  <td class="col-md-5">
                    <div class="media-left">
                      <div id="campaigns-donut"></div>
                    </div>

                    <div class="media-left">
                      <h5 class="text-semibold no-margin">38,289 <small class="text-success text-size-base"><i class="icon-arrow-up12"></i> (+16.2%)</small></h5>
                      <ul class="list-inline list-inline-condensed no-margin">
                        <li>
                          <span class="status-mark border-success"></span>
                        </li>
                        <li>
                          <span class="text-muted">May 12, 12:30 am</span>
                        </li>
                      </ul>
                    </div>
                  </td>

                  <td class="col-md-5">
                    <div class="media-left">
                      <div id="campaign-status-pie"></div>
                    </div>

                    <div class="media-left">
                      <h5 class="text-semibold no-margin">2,458 <small class="text-danger text-size-base"><i class="icon-arrow-down12"></i> (- 4.9%)</small></h5>
                      <ul class="list-inline list-inline-condensed no-margin">
                        <li>
                          <span class="status-mark border-danger"></span>
                        </li>
                        <li>
                          <span class="text-muted">Jun 4, 4:00 am</span>
                        </li>
                      </ul>
                    </div>
                  </td>

                  <td class="text-right col-md-2">
                    <a href="#" class="btn bg-indigo-300"><i class="icon-statistics position-left"></i> View report</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table text-nowrap">
              <thead>
                <tr>
                  <th>Campaign</th>
                  <th class="col-md-2">Client</th>
                  <th class="col-md-2">Changes</th>
                  <th class="col-md-2">Budget</th>
                  <th class="col-md-2">Status</th>
                  <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                </tr>
              </thead>
              <tbody>
                <tr class="active border-double">
                  <td colspan="5">Today</td>
                  <td class="text-right">
                    <span class="progress-meter" id="today-progress" data-progress="30"></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Facebook</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-blue position-left"></span>
                        02:00 - 03:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">Mintlime</span></td>
                  <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 2.43%</span></td>
                  <td><h6 class="text-semibold">$5,489</h6></td>
                  <td><span class="label bg-blue">Active</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Youtube videos</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-danger position-left"></span>
                        13:00 - 14:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">CDsoft</span></td>
                  <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 3.12%</span></td>
                  <td><h6 class="text-semibold">$2,592</h6></td>
                  <td><span class="label bg-danger">Closed</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Spotify ads</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-grey-400 position-left"></span>
                        10:00 - 11:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">Diligence</span></td>
                  <td><span class="text-danger"><i class="icon-stats-decline2 position-left"></i> - 8.02%</span></td>
                  <td><h6 class="text-semibold">$1,268</h6></td>
                  <td><span class="label bg-grey-400">Hold</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Twitter ads</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-grey-400 position-left"></span>
                        04:00 - 05:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">Deluxe</span></td>
                  <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 2.78%</span></td>
                  <td><h6 class="text-semibold">$7,467</h6></td>
                  <td><span class="label bg-grey-400">Hold</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>

                <tr class="active border-double">
                  <td colspan="5">Yesterday</td>
                  <td class="text-right">
                    <span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Bing campaign</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-success position-left"></span>
                        15:00 - 16:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">Metrics</span></td>
                  <td><span class="text-danger"><i class="icon-stats-decline2 position-left"></i> - 5.78%</span></td>
                  <td><h6 class="text-semibold">$970</h6></td>
                  <td><span class="label bg-success-400">Pending</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropup">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Amazon ads</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-danger position-left"></span>
                        18:00 - 19:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">Blueish</span></td>
                  <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i> 6.79%</span></td>
                  <td><h6 class="text-semibold">$1,540</h6></td>
                  <td><span class="label bg-blue">Active</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropup">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
                    </div>
                    <div class="media-left">
                      <div class=""><a href="#" class="text-default text-semibold">Dribbble ads</a></div>
                      <div class="text-muted text-size-small">
                        <span class="status-mark border-blue position-left"></span>
                        20:00 - 21:00
                      </div>
                    </div>
                  </td>
                  <td><span class="text-muted">Teamable</span></td>
                  <td><span class="text-danger"><i class="icon-stats-decline2 position-left"></i> 9.83%</span></td>
                  <td><h6 class="text-semibold">$8,350</h6></td>
                  <td><span class="label bg-danger">Closed</span></td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropup">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
                          <li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
                          <li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
                          <li class="divider"></li>
                          <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /marketing campaigns -->


        <!-- Quick stats boxes -->
        <div class="row">
          <div class="col-lg-4">

            <!-- Members online -->
            <div class="panel bg-teal-400">
              <div class="panel-body">
                <div class="heading-elements">
                  <span class="heading-text badge bg-teal-800">+53,6%</span>
                </div>

                <h3 class="no-margin">3,450</h3>
                Members online
                <div class="text-muted text-size-small">489 avg</div>
              </div>

              <div class="container-fluid">
                <div id="members-online"></div>
              </div>
            </div>
            <!-- /members online -->

          </div>

          <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-pink-400">
              <div class="panel-body">
                <div class="heading-elements">
                  <ul class="icons-list">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                        <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                        <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                        <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                      </ul>
                            </li>
                          </ul>
                </div>

                <h3 class="no-margin">49.4%</h3>
                Current server load
                <div class="text-muted text-size-small">34.6% avg</div>
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

          <div class="col-lg-4">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
              <div class="panel-body">
                <div class="heading-elements">
                  <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                          </ul>
                        </div>

                <h3 class="no-margin">$18,390</h3>
                Today's revenue
                <div class="text-muted text-size-small">$37,578 avg</div>
              </div>

              <div id="today-revenue"></div>
            </div>
            <!-- /today's revenue -->

          </div>
        </div>
        <!-- /quick stats boxes -->




      </div>

      <div class="col-lg-4">

        <!-- Progress counters -->
        <div class="row">
          <div class="col-md-6">

            <!-- Available hours -->
            <div class="panel text-center">
              <div class="panel-body">
                <div class="heading-elements">
                  <ul class="icons-list">
                            <li class="dropdown text-muted">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                        <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                        <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                        <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                      </ul>
                            </li>
                          </ul>
                        </div>

                        <!-- Progress counter -->
                <div class="content-group-sm svg-center position-relative" id="hours-available-progress"></div>
                <!-- /progress counter -->


                <!-- Bars -->
                <div id="hours-available-bars"></div>
                <!-- /bars -->

              </div>
            </div>
            <!-- /available hours -->

          </div>

          <div class="col-md-6">

            <!-- Productivity goal -->
            <div class="panel text-center">
              <div class="panel-body">
                <div class="heading-elements">
                  <ul class="icons-list">
                            <li class="dropdown text-muted">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                        <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                        <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                        <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                      </ul>
                            </li>
                          </ul>
                </div>

                <!-- Progress counter -->
                <div class="content-group-sm svg-center position-relative" id="goal-progress"></div>
                <!-- /progress counter -->

                <!-- Bars -->
                <div id="goal-bars"></div>
                <!-- /bars -->

              </div>
            </div>
            <!-- /productivity goal -->

          </div>
        </div>
        <!-- /progress counters -->


        <!-- Daily sales -->
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Daily sales stats</h6>
            <div class="heading-elements">
              <span class="heading-text">Balance: <span class="text-bold text-danger-600 position-right">$4,378</span></span>
              <ul class="icons-list">
                        <li class="dropdown text-muted">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                  </ul>
                        </li>
                      </ul>
            </div>
          </div>

          <div class="panel-body">
            <div id="sales-heatmap"></div>
          </div>

          <div class="table-responsive">
            <table class="table text-nowrap">
              <thead>
                <tr>
                  <th>Application</th>
                  <th>Time</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#" class="btn bg-primary-400 btn-rounded btn-icon btn-xs">
                        <span class="letter-icon"></span>
                      </a>
                    </div>

                    <div class="media-body">
                      <div class="media-heading">
                        <a href="#" class="letter-icon-title">Sigma application</a>
                      </div>

                      <div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i> New order</div>
                    </div>
                  </td>
                  <td>
                    <span class="text-muted text-size-small">06:28 pm</span>
                  </td>
                  <td>
                    <h6 class="text-semibold no-margin">$49.90</h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
                        <span class="letter-icon"></span>
                      </a>
                    </div>

                    <div class="media-body">
                      <div class="media-heading">
                        <a href="#" class="letter-icon-title">Alpha application</a>
                      </div>

                      <div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
                    </div>
                  </td>
                  <td>
                    <span class="text-muted text-size-small">04:52 pm</span>
                  </td>
                  <td>
                    <h6 class="text-semibold no-margin">$90.50</h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#" class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
                        <span class="letter-icon"></span>
                      </a>
                    </div>

                    <div class="media-body">
                      <div class="media-heading">
                        <a href="#" class="letter-icon-title">Delta application</a>
                      </div>

                      <div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
                    </div>
                  </td>
                  <td>
                    <span class="text-muted text-size-small">01:26 pm</span>
                  </td>
                  <td>
                    <h6 class="text-semibold no-margin">$60.00</h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs">
                        <span class="letter-icon"></span>
                      </a>
                    </div>

                    <div class="media-body">
                      <div class="media-heading">
                        <a href="#" class="letter-icon-title">Omega application</a>
                      </div>

                      <div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
                    </div>
                  </td>
                  <td>
                    <span class="text-muted text-size-small">11:46 am</span>
                  </td>
                  <td>
                    <h6 class="text-semibold no-margin">$55.00</h6>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="media-left media-middle">
                      <a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
                        <span class="letter-icon"></span>
                      </a>
                    </div>

                    <div class="media-body">
                      <div class="media-heading">
                        <a href="#" class="letter-icon-title">Alpha application</a>
                      </div>

                      <div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
                    </div>
                  </td>
                  <td>
                    <span class="text-muted text-size-small">10:29 am</span>
                  </td>
                  <td>
                    <h6 class="text-semibold no-margin">$90.50</h6>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /daily sales -->


      </div>
    </div>


  </div>
</template>

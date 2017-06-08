<?php
$this->breadcrumbs = array(

    'Список текущих заданий',
);


?>



<div class="wrapper wrapper-white">

    <div class="row">
        <div class="col-md-10">

            <div class="page-subtitle">
                <!--				<h3>Fullscreen Mode</h3>-->

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Срочные договора</h3>
                    <ul class="panel-btn">
                        <li><a href="#" class="btn btn-danger"
                               onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                    class="fa fa-compress"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>

                    <div class="table-responsive">


                        <table class="table table-bordered table-striped table-hover text-center">
                            <tr>
                                <th width="200" class="text-left">Details</th>
                                <th width="150" class="text-left">Products</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Delivery</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="list-contacts list-contacts-inline" style="width: 160px;">
                                        <a href="#" class="list-contacts-item contact-online">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_2.jpg"> Devin Stephens
                                        </a>
                                    </div>
                                </td>
                                <td class="text-left table-products">
                                    <a href="#">Awesome T-shirt</a>
                                </td>
                                <td>1</td>
                                <td><strong>$15.99</strong></td>
                                <td class="text-left">
                                    <span class="label label-danger" style="margin-right: 10px;">Courier</span>
                                    UK,London. Street st. 159
                                </td>
                                <td><span class="label label-success">New</span></td>
                                <td>
                                    <button class="btn btn-primary btn-rounded btn-clean">view</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="list-contacts list-contacts-inline" style="width: 160px;">
                                        <a href="#" class="list-contacts-item contact-away">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_3.jpg"> Marissa George
                                        </a>
                                    </div>
                                </td>
                                <td class="text-left table-products">
                                    <a href="#">Oldor GG pants</a><br><a href="#">Socks (white)</a>
                                </td>
                                <td>1 / 1</td>
                                <td><strong>$57.45</strong></td>
                                <td class="text-left">
                                    <span class="label label-info" style="margin-right: 10px;">Pickup</span>
                                    USA,New York. Highway st. 5
                                </td>
                                <td><span class="label label-warning">In queue</span></td>
                                <td>
                                    <button class="btn btn-primary btn-rounded btn-clean">view</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="list-contacts list-contacts-inline" style="width: 160px;">
                                        <a href="#" class="list-contacts-item contact-offline">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_1.jpg"> John Doe
                                        </a>
                                    </div>
                                </td>
                                <td class="text-left table-products">
                                    <a href="#">pPhone 64Gb</a><br><a href="#">Accessories</a>
                                </td>
                                <td>1 / 2</td>
                                <td><strong>$348.00</strong></td>
                                <td class="text-left">
                                    <span class="label label-danger" style="margin-right: 10px;">Courier</span>
                                    UA, Kiev. Revuts st. 42
                                </td>
                                <td><span class="label label-danger">Delivering</span></td>
                                <td>
                                    <button class="btn btn-primary btn-rounded btn-clean">view</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="list-contacts list-contacts-inline" style="width: 160px;">
                                        <a href="#" class="list-contacts-item contact-offline">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/user_4.jpg"> Karen Spencer
                                        </a>
                                    </div>
                                </td>
                                <td class="text-left table-products">
                                    <a href="#">Teddy Bear</a><br><a href="#">Flowers (Roses)</a>
                                </td>
                                <td>1 / 21</td>
                                <td><strong>$121.32</strong></td>
                                <td class="text-left">
                                    <span class="label label-success" style="margin-right: 10px;">Post</span>
                                    RU, Moscow. Lenina st. 11
                                </td>
                                <td><span class="label label-success">Delivered</span></td>
                                <td>
                                    <button class="btn btn-primary btn-rounded btn-clean">view</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </p>
                </div>
            </div>

        </div>
        <div class="col-md-2">

            <div class="page-subtitle">
                <!--				<h3>Collapse Panel</h3>-->

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Задания</h3>
                    <ul class="panel-btn">
                        <li><a href="#" class="btn btn-danger panel-collapse"><i class="fa fa-angle-down"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>

                    <div class="list-group">
                        <a href="#" class="list-group-item">Inbox <span class="badge badge-danger">32</span></a>
                        <a href="#" class="list-group-item">Sent</a>
                        <a href="#" class="list-group-item">Drafts <span class="badge badge-info">2</span></a>
                        <a href="#" class="list-group-item">Spam <span class="badge badge-warning">8</span></a>
                        <a href="#" class="list-group-item">Starred</a>
                    </div>
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>


<!--<div class="row">

	<div class="col-md-12">

		<div class="wrapper padding-bottom-0">
			<div class="dev-table">
				<div class="dev-col">

					<div class="dev-widget dev-widget-transparent">
						<h2>Server Usage</h2>

						<p>Total server usage in percentages</p>

						<div class="dev-stat"><span class="counter">68</span>%</div>
						<div class="progress progress-bar-xs">
							<div class="progress-bar progress-bar-info" role="progressbar"
								 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
								 style="width: 50%;"></div>
						</div>
						<p>We totally recommend you change your plan to <strong>Pro</strong>. Click here
							to get more details.</p>

						<a href="#" class="dev-drop">Take a closer look <span
								class="fa fa-angle-right pull-right"></span></a>
					</div>

				</div>
				<div class="dev-col">

					<div class="dev-widget dev-widget-transparent dev-widget-success">
						<h2>Total Earnings</h2>

						<p>This is total earnings per last year</p>

						<div class="dev-stat">$<span class="counter">75,332</span></div>
						<div class="progress progress-bar-xs">
							<div class="progress-bar progress-bar-success" role="progressbar"
								 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
								 style="width: 79%;"></div>
						</div>
						<p>We happy to notice you that you become an Elite customer, and you can get
							some custom sugar.</p>

						<a href="#" class="dev-drop">Take a closer look <span
								class="fa fa-angle-right pull-right"></span></a>
					</div>

				</div>
				<div class="dev-col">

					<div class="dev-widget dev-widget-transparent dev-widget-danger">
						<h2>Your Balance</h2>

						<p>All your earnings for this time</p>

						<div class="dev-stat">$<span class="counter">5,321</span></div>
						<div class="progress progress-bar-xs">
							<div class="progress-bar progress-bar-danger" role="progressbar"
								 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
								 style="width: 80%;"></div>
						</div>
						<p>You can withdraw this money in end of each month. Also you can spend it on
							our marketplace.</p>

						<a href="#" class="dev-drop">Take a closer look <span
								class="fa fa-angle-right pull-right"></span></a>
					</div>

				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="table-controls">
				<div class="page-subtitle">
					<h2>Order statistics</h2>

					<div class="table-controls-block"></div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover text-center">
						<thead>
						<tr>
							<th>Year</th>
							<th>Ja.</th>
							<th>Fe.</th>
							<th>Ma.</th>
							<th>Aw.</th>
							<th>Ma.</th>
							<th>Ju.</th>
							<th>Ju.</th>
							<th>Ao.</th>
							<th>Se.</th>
							<th>Oc.</th>
							<th>No.</th>
							<th>De.</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>2015</td>
							<td>923</td>
							<td>975</td>
							<td>1,021</td>
							<td>950</td>
							<td>915</td>
							<td>841</td>
							<td>802</td>
							<td>896</td>
							<td>971</td>
							<td>955</td>
							<td>921</td>
							<td>1,032</td>
						</tr>
						<tr>
							<td>2014</td>
							<td>823</td>
							<td>875</td>
							<td>902</td>
							<td>850</td>
							<td>815</td>
							<td>841</td>
							<td>702</td>
							<td>796</td>
							<td>871</td>
							<td>855</td>
							<td>821</td>
							<td>955</td>
						</tr>
						<tr>
							<td>2013</td>
							<td>533</td>
							<td>517</td>
							<td>590</td>
							<td>601</td>
							<td>612</td>
							<td>586</td>
							<td>547</td>
							<td>605</td>
							<td>638</td>
							<td>477</td>
							<td>541</td>
							<td>680</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>-->


<!-- Copyright -->
<!--<div class="copyright">
    <div class="pull-left">
        &copy; 2015 <strong>Aqvatarius</strong>. All rights reserved.
    </div>
    <div class="pull-right">
        <a href="#">Terms of use</a> / <a href="#">Privacy Policy</a>
    </div>
</div>-->
<!-- ./Copyright -->

<!-- ./page content container -->


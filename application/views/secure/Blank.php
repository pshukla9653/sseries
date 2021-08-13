<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(1));?>"><?=ucfirst($this->uri->segment(1));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(1));?>"><?=ucfirst($this->uri->segment(1));?></a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">
						<div class="col-md-6">

							<!-- Basic layout-->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><?=ucfirst($this->uri->segment(1));?></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">Name:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" placeholder="Eugene Kopyov">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Password:</label>
											<div class="col-lg-9">
												<input type="password" class="form-control" placeholder="Your strong password">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your state:</label>
											<div class="col-lg-9">
												<select class="select">
													<optgroup label="Alaskan/Hawaiian Time Zone">
														<option value="AK">Alaska</option>
														<option value="HI">Hawaii</option>
													</optgroup>
													<optgroup label="Pacific Time Zone">
														<option value="CA">California</option>
														<option value="NV">Nevada</option>
														<option value="WA">Washington</option>
													</optgroup>
													<optgroup label="Mountain Time Zone">
														<option value="AZ">Arizona</option>
														<option value="CO">Colorado</option>
														<option value="WY">Wyoming</option>
													</optgroup>
													<optgroup label="Central Time Zone">
														<option value="AL">Alabama</option>
														<option value="AR">Arkansas</option>
														<option value="KY">Kentucky</option>
													</optgroup>
													<optgroup label="Eastern Time Zone">
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Gender:</label>
											<div class="col-lg-9">
												<label class="radio-inline">
													<input type="radio" class="styled" name="gender" checked="checked">
													Male
												</label>

												<label class="radio-inline">
													<input type="radio" class="styled" name="gender">
													Female
												</label>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your avatar:</label>
											<div class="col-lg-9">
												<input type="file" class="file-styled">
												<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Tags:</label>
											<div class="col-lg-9">
												<select multiple="multiple" data-placeholder="Enter tags" class="select-icons">
													<optgroup label="Services">
														<option value="wordpress2" data-icon="wordpress2">Wordpress</option>
														<option value="tumblr2" data-icon="tumblr2">Tumblr</option>
														<option value="stumbleupon" data-icon="stumbleupon">Stumble upon</option>
														<option value="pinterest2" data-icon="pinterest2">Pinterest</option>
														<option value="lastfm2" data-icon="lastfm2">Lastfm</option>
													</optgroup>
													<optgroup label="File types">
														<option value="pdf" data-icon="file-pdf">PDF</option>
														<option value="word" data-icon="file-word">Word</option>
														<option value="excel" data-icon="file-excel">Excel</option>
														<option value="openoffice" data-icon="file-openoffice">Open office</option>
													</optgroup>
													<optgroup label="Browsers">
														<option value="chrome" data-icon="chrome" selected="selected">Chrome</option>
														<option value="firefox" data-icon="firefox" selected="selected">Firefox</option>
														<option value="safari" data-icon="safari">Safari</option>
														<option value="opera" data-icon="opera">Opera</option>
														<option value="IE" data-icon="IE">IE</option>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your message:</label>
											<div class="col-lg-9">
												<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							
							<!-- /basic layout -->

						</div>

						<div class="col-md-6">

							<!-- Static mode -->
							<form class="form-horizontal" action="#">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Static mode</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">Name:</label>
											<div class="col-lg-9">
												<div class="form-control-static">Eugene Kopyov</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Password:</label>
											<div class="col-lg-9">
												<input type="password" class="form-control" readonly value="********">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your state:</label>
											<div class="col-lg-9">
												<select class="select" disabled="disabled">
													<optgroup label="Alaskan/Hawaiian Time Zone">
														<option value="AK">Alaska</option>
														<option value="HI">Hawaii</option>
													</optgroup>
													<optgroup label="Pacific Time Zone">
														<option value="CA">California</option>
														<option value="NV" selected="selected">Nevada</option>
														<option value="WA">Washington</option>
													</optgroup>
													<optgroup label="Mountain Time Zone">
														<option value="AZ">Arizona</option>
														<option value="CO">Colorado</option>
														<option value="WY">Wyoming</option>
													</optgroup>
													<optgroup label="Central Time Zone">
														<option value="AL">Alabama</option>
														<option value="AR">Arkansas</option>
														<option value="KY">Kentucky</option>
													</optgroup>
													<optgroup label="Eastern Time Zone">
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Gender:</label>
											<div class="col-lg-9">
												<label class="radio-inline disabled">
													<input type="radio" class="styled" name="gender" disabled="disabled" checked="checked">
													Male
												</label>

												<label class="radio-inline disabled">
													<input type="radio" class="styled" name="gender" disabled="disabled">
													Female
												</label>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your avatar:</label>
											<div class="col-lg-9">
												<div class="media no-margin-top">
													<div class="media-left">
														<a href="#"><img src="assets/images/placeholder.jpg" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
													</div>

													<div class="media-body">
														<input type="file" class="file-styled">
														<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Tags:</label>
											<div class="col-lg-9">
												<select multiple="multiple" disabled="disabled" data-placeholder="Enter tags" class="select-icons">
													<optgroup label="Services">
														<option value="wordpress2" data-icon="wordpress2">Wordpress</option>
														<option value="tumblr2" data-icon="tumblr2">Tumblr</option>
														<option value="stumbleupon" data-icon="stumbleupon">Stumble upon</option>
														<option value="pinterest2" data-icon="pinterest2">Pinterest</option>
														<option value="lastfm2" data-icon="lastfm2">Lastfm</option>
													</optgroup>
													<optgroup label="File types">
														<option value="pdf" data-icon="file-pdf">PDF</option>
														<option value="word" data-icon="file-word">Word</option>
														<option value="excel" data-icon="file-excel">Excel</option>
														<option value="openoffice" data-icon="file-openoffice">Open office</option>
													</optgroup>
													<optgroup label="Browsers">
														<option value="chrome" data-icon="chrome" selected="selected">Chrome</option>
														<option value="firefox" data-icon="firefox" selected="selected">Firefox</option>
														<option value="safari" data-icon="safari">Safari</option>
														<option value="opera" data-icon="opera">Opera</option>
														<option value="IE" data-icon="IE">IE</option>
													</optgroup>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your message:</label>
											<div class="col-lg-9">
												<div class="form-control-static">
													<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment.</p>
												</div>
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /static mode -->

						</div>
					</div>
					<!-- /vertical form options -->



				</div>
				<!-- /content area -->
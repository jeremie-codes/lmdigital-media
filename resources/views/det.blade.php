<?php $page='' ?>
@extends('layouts.app')

@section('content')

	<section class="page-header page-header-modern bg-primary m-0 py-0">
		<div class="container py-2">
			<div class="row py-3">
				<div class="col-md-12 align-self-center p-static text-center">
					<h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Détail</h1>
					<div class="divider divider-light divider-small my-3 text-center">
						<hr class="mt-2 mx-auto">
					</div>								
				</div>
				<div class="col-md-12 align-self-center">
					<ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
						<li><a href="#">Accueil</a></li>
						<li class="active">Détail</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="m-0 section section-no-background section-no-border">
		<div class="container">

			<div class="row">

				<div class="col-lg-12 order-2 order-lg-1 mt-0">

					<div class="tab-pane tab-pane-navigation active" id="tabsNavigation1">
						<h3 class="mt-4 mb-0 pb-0">Détail de l'article</h3>
						
						<div class="divider divider-primary divider-small my-3">
							<hr class="mt-2 me-auto">
						</div>

						<div class="col">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post border-0 m-0 p-0">
									<div class="post-image ms-0">
										<a href="blog-post.html">
											<img src="img/blog/wide/blog-11.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
										</a>
									</div>

									<div class="post-date ms-0">
										<span class="day">10</span>
										<span class="month">Jan</span>
									</div>

									<div class="post-content ms-0">

										<h2 class="font-weight-semi-bold"><a href="blog-post.html">Class aptent taciti sociosqu ad litora torquent</a></h2>

										<div class="post-meta">
											<span><i class="far fa-user"></i> Par <a href="#">John Doe</a> </span>
											<span><i class="far fa-folder"></i> <a href="#">catégorie article </span>
											<span><i class="far fa-comments"></i> <a href="#">2 Commentaires</a></span>
										</div>

										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum sit amet placerat et, bibendum nec mauris. Duis molestie, purus eget placerat viverra, nisi odio gravida sapien, congue tincidunt nisl ante nec tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis, massa fringilla consequat blandit, mauris ligula porta nisi, non tristique enim sapien vel nisl. Suspendisse vestibulum lobortis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent nec tempus nibh. Donec mollis commodo metus et fringilla. Etiam venenatis, diam id adipiscing convallis, nisi eros lobortis tellus, feugiat adipiscing ante ante sit amet dolor. Vestibulum vehicula scelerisque facilisis. Sed faucibus placerat bibendum. Maecenas sollicitudin commodo justo, quis hendrerit leo consequat ac. Proin sit amet risus sapien, eget interdum dui. Proin justo sapien, varius sit amet hendrerit id, egestas quis mauris.</p>

										<div id="comments" class="post-block mt-5 post-comments">
											<h4 class="mb-3">Commentaires (2)</h4>

											<ul class="comments">
												<li>
													<div class="comment">
														<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
															<img class="avatar" alt="" src="img/avatars/avatar.jpg">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>Jer. Mianda</strong>
																<span class="float-end">
																	<span> <a href="#"><i class="fas fa-reply"></i> commentaire</a></span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															<span class="date float-end">12 Janvier 2024, 10:20 </span>
														</div>
													</div>
												</li>
												
												<li>
													<div class="comment">
														<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
															<img class="avatar" alt="" src="img/avatars/avatar.jpg">
														</div>

														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>Anonyme</strong>
																<span class="float-end">
																	<span> <a href="#"><i class="fas fa-reply"></i> commentaire</a></span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															<span class="date float-end">12 Janvier 2024, 10:20 </span>
														</div>
													</div>
												</li>
											</ul>

										</div>

										<div class="post-block mt-5 post-leave-comment">
											<h4 class="mb-3">Écrire un commentaire</h4>

											<form class="contact-form p-4 rounded bg-color-grey" action="php/contact-form.php" method="POST">			
												<div class="p-2">
													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label required font-weight-bold text-dark">Nom complet</label>
															<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label required font-weight-bold text-dark">Addresse Email</label>
															<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label class="form-label required font-weight-bold text-dark">Commentaire</label>
															<textarea maxlength="255" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" required></textarea>
														</div>
													</div>
													<div class="row">
														<div class="form-group col mb-0">
															<input type="submit" value="Poster le commentaire" class="btn btn-primary btn-modern" data-loading-text="Loading...">
														</div>
													</div>
												</div>
											</form>
										</div>

									</div>
								</article>

							</div>
						</div>

					</div>

				</div>

			</div>

		</div>
	</section>

@endsection
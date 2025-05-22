<?php $page='' ?>
@extends('app')

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
						<h3 class="mt-4 mb-0 pb-0">Contenu de l'article</h3>
						
						<div class="divider divider-primary divider-small my-3">
							<hr class="mt-2 me-auto">
						</div>

						<div class="col">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post border-0 m-0 p-0">
									<div class="post-image ms-0">
										<a href="blog-post.html">
											<img src="{{ url('storage/' . $article->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="image"
											 height="100" />
										</a>
									</div>

									<div class="post-date ms-0">
										<span class="day">10</span>
										<span class="month">Jan</span>
									</div>

									<div class="post-content ms-0">

										<h3 class="font-weight-semi-bold">
										    <a href="#!"> {{ $article->titre }} </a> <br>
										    <a href="#!" style="font-size: 20px" class="text-info"> {{ $article->sous_titre }} </a>
										</h3>
                                        
										<div class="post-meta">
											<span><i class="far fa-user"></i> Par <a href="#">Lumière digitale</a> </span>
											<span><i class="far fa-folder"></i> <a href="#">catégorie article </span>
											<span><i class="far fa-comments"></i> <a href="#" >{{ count($article->commentaires) }} Commentaires</a></span>
										</div>
										
										<p class="font-weight-semi-bold">Partager cet article :</p>
										<div class="post-meta">
											<span>
											    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-primary"><i class="fab fa-facebook-f" style="font-size: 14px;"></i></a>
										    </span>
										    <span>
											    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->titre) }}"  target="_blank" class="btn btn-primary"><i class="fab fa-twitter" style="font-size: 14px;"></i></a>
										    </span>
										    <span>
											    <a href="https://api.whatsapp.com/send?text={{ urlencode($article->titre . ' ' . url()->current()) }}" target="_blank" class="btn btn-primary"><i class="fab fa-whatsapp" style="font-size: 14px;"></i></a>
										    </span>
										    <span>
											    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($article->titre) }}" target="_blank" class="btn btn-primary"><i class="fab fa-linkedin" style="font-size: 14px;"></i></a>
										    </span>
										    <span>
											    <a href="mailto:?subject={{ urlencode($article->titre) }}&body={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-primary"><i class="fa fa-envelope" style="font-size: 14px;"></i></a>
										    </span>
										</div>
										
										<p class="text-justify">{{ $article->contenu }}</p>

										<div id="comments" class="post-block mt-5 post-comments">
											<h4 class="mb-3">Commentaires ({{ count($article->commentaires) }})</h4>

											<ul class="comments">
											    @foreach($article->commentaires as $commentaire)
												<li>
													<div class="comment">
														<div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block p-1">
															<i class="fa fa-user" style="font-size: 24px"></i>
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>{{ $commentaire->nom }}</strong>
																<span class="float-end">
																	<span> <a href="#"><i class="fas fa-reply"></i> commentaire </a></span>
																</span>
															</span>
															<p>{{ $commentaire->commentaire }}</p>
															<span class="date float-end">{{ $commentaire->created_at }}</span>
														</div>
													</div>
												</li>
												@endforeach
											</ul>

										</div>

										<div class="post-block mt-5 post-leave-comment">
											<h4 class="mb-3">Écrire un commentaire</h4>

											<form class="contact-for p-4 rounded bg-color-grey" action="{{ route('commentaires.store', $article->id) }}" method="POST">
											    @csrf			
												<div class="p-2">
													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label required font-weight-bold text-dark">Nom</label>
															<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="nom" required>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label required font-weight-bold text-dark">Addresse Email</label>
															<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label class="form-label required font-weight-bold text-dark">Commentaire</label>
															<textarea maxlength="255" data-msg-required="Please enter your message." rows="8" class="form-control" name="commentaire" required></textarea>
														</div>
													</div>
													<div class="row">
														<div class="form-group col mb-0">
															<button type="submit" class="btn btn-primary btn-modern">Poster le commentaire</button>
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
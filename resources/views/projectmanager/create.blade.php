@extends('layouts.appmanager')
@section('content')
<div class="card">
<div class="card-body">
    <div class="card-title row">
        <div class="text col-md-4">
            <a href="{{ route('home') }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-reply"></i>Back To COINS</a>
        </div>
      
      <div class=" col-md-8">
          <a href="{{ route('opportunities.index') }}" style="float:right" class="btn btn-outline-danger btn-sm "><i class="fa fa-fw fa-plus"></i>Register an Associate</a>
        </div>
       </div>
                <h2 class="h3 text-center">Project Evaluation Tool</h2>
       <!---body-->
       <div class="tab-container">
		<header>
				<div id="material-tabs">
						<a id="tab1-tab" href="#tab1" class="active">Project Initiation</a>
						<a id="tab2-tab" href="#tab2">Project Definition</a>
						<a id="tab3-tab" href="#tab3">Project Launch</a>
                        <a id="tab4-tab" href="#tab4">Perfomance</a>
                        <a id="tab5-tab" href="#tab5">Closure</a>
						<span class="yellow-bar"></span>
				</div>
		</header>

		<div class="tab-content">
				<div id="tab1">
						<p>There are three basic ideas invoved in creating these tabs:</p>
						<ol>
								<li>Use anchor tags as tabs.</li>
								<li>Use a span class for the tab highlight.</li>
							<li>In your CSS, adjust the <strong>position</strong> of the highlight, as well as it's <strong>width</strong>, by detecting the anchor tag with an 'active' class. Then adjust its left property and width property. Add a transition in your CSS, <em>et voil&agrave;</em>.</li>
						</ol>
				</div>
				<div id="tab2">
						<p>Second tab content.</p>
				</div>
				<div id="tab3">
						<p>Third tab content.</p>
				</div>
							<div id="tab4">
						<p>FOUR tab content.</p>
                </div>
                <div id="tab5">
                    <p>TFifth tab content.</p>
            </div>
		</div>
</div>
<!-- end container -->
</div>
</div>

@endSection

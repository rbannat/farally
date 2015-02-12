@extends('layouts.main')
@section('content')
<body>
	@include('partials.header', array('title'=> 'Create Trip'))
	<section class="section main">
		<div class="section_container">
			<article>
				<header>
					<h1>Create Trip</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
				</header>
				<section>
					{{ HTML::ul($errors->all()) }}
					{{ Form::open(array('url' => 'trips/add')) }}
					<ul class="list">
						<li>
							{{ Form::text('title', null, array('class'=>'input input_text', 'placeholder'=>'Title')) }}
						</li>
						<li>
							{{ Form::text('start-destination', null, array('class'=>'input input_text', 'placeholder'=>'Start')) }}
						</li>
						<li>
							{{ Form::text('destination', null, array('class'=>'input input_text', 'placeholder'=>'Destination')) }}
						</li>
						<li>
							<label class="label">Earliest start date</label>
							{{Form::input('date','start_date', null, array('class'=>'input input_text')) }}
						</li>
						<li>
							<label class="label">Latest return date</label>
							{{Form::input('date','end_date', null, array('class'=>'input input_text')) }}
						</li>
						<li>
							{{ Form::textarea('description', null, array('class' => 'input input_text', 'placeholder'=>'Description')) }}
						</li>
						<li>
							{{ Form::number('max_travellers', null, array('class'=>'input input_text', 'placeholder'=>'Max. travellers')) }}
						</li>
						<li>
							<div class="badge checkbox" onclick="checktoggle(this);">
								<i class="fa no_pic fa-user fa-1x"></i><span>{{ Form::checkbox('transport[]', 'car', false, array('class'=>'checkbox')) }} Car</span>
							</div>
							<div class="badge checkbox" onclick="checktoggle(this);">
								<i class="fa no_pic fa-bus fa-1x"></i><span>{{ Form::checkbox('transport[]', 'bus', false, array('class'=>'checkbox')) }} Bus</span>
							</div>
							<div class="badge checkbox" onclick="checktoggle(this);">
								<i class="fa no_pic fa-train fa-1x"></i><span>{{ Form::checkbox('transport[]', 'train', false, array('class'=>'checkbox')) }} Train</span>
							</div>
							<div class="badge checkbox" onclick="checktoggle(this);">
								<i class="fa no_pic fa-plane fa-1x"></i><span>{{ Form::checkbox('transport[]', 'plane', false, array('class'=>'checkbox')) }} Plane</span>
							</div>
							<div class="badge checkbox" onclick="checktoggle(this);">
								<i class="fa no_pic fa-bicycle fa-1x"></i><span>{{ Form::checkbox('transport[]', 'bicycle', false, array('class'=>'checkbox')) }} Bicycle</span>
							</div>
							<div class="badge checkbox" onclick="checktoggle(this);">
								<i class="fa no_pic fa-truck fa-1x"></i><span>{{ Form::checkbox('transport[]', 'hitchhiking', false, array('class'=>'checkbox')) }} Hitchhiking</span>
							</div>
						</li>
						<li>
							{{ Form::submit('Create', array('class'=>'button')) }}
						</li>
					</ul>
					{{ Form::close() }}

				</section>
			</article>
		</div>
	</section>
	<script type="text/javascript">
		function checktoggle(element) {
			console.log(element.children[1].children[0].checked);
			if (element.children[1].children[0].checked === false) {
				element.classList.add('checked');
				element.children[1].children[0].checked = true;
			} else {
				element.classList.remove('checked');
				element.children[1].children[0].checked = false;
			}
		}
	</script>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop

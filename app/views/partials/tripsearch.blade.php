<section class="section search">
	<div class="section_container">
		<h3 class="section_container_title_small"><i class="fa fa-search fa-1x"></i>Find Your Travel Buddy<i class="fa fa-sliders filter_button fa-1x"></i></h3>
		{{ Form::open(array('url'=>'/search')) }}
		{{ Form::text('location-search', null, array('class'=>'input input_text', 'placeholder'=>'search by destination', 'id'=>'location-search')) }}
		<ul class="list filter">
			<li>
				{{ Form::text('start-destination', null, array('class'=>'input input_text', 'placeholder'=>'Start')) }}
			</li>
			<li>
				{{ Form::number('max_travellers', null, array('class'=>'input input_text', 'placeholder'=>'Max. travellers')) }}

			</li>
			<li>
				<label class="label">Earliest start date</label>
				{{Form::input('date','start_date', null, array('class'=>'input input_text'))}}
			</li>
			<li>
				<label class="label">Latest return date</label>
				{{Form::input('date','end_date', null, array('class'=>'input input_text'))}}
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

		</ul>
		{{ Form::submit('Search', array('class'=>'button'))}}
		{{ Form::close() }}
	</div>
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
</section>
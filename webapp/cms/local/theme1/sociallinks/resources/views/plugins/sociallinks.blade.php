<div class="social-links">

	<div class="social">
	    <ul class="social-networks spin-icon" style="display:flex;"> 
	    	@if(isset($data['linkedin']))
		    <li>
		     	<a href="{{$data['linkedin']}}" class="icon-linkedin"><i class="fa fa-linkedin"></i></a>
		    </li>
		    @endif  
		    @if(isset($data['twitter']))
		    <li>
		     	<a href="{{$data['twitter']}}" class="icon-twitter"><i class="fa fa-twitter"></i></a>
	     	</li>
	     	@endif 
	     	 @if(isset($data['facebook'])) 
		    <li>
		     <a href="{{$data['facebook']}}" class="icon-facebook"><i class="fa fa-facebook"></i></a>
		    </li>
		    @endif  
		     @if(isset($data['twitch']))
		    <li>
		     	<a href="{{$data['twitch']}}" class="icon-twitch">Twitch</a>
		    </li> 
		     @endif
		     @if(isset($data['github']))
		    <li>
		     	<a href="{{$data['github']}}" class="icon-github"><i class="fa fa-github"></i
                ></a>
		    </li> 
		     @endif   
		     @if(isset($data['pinterest']))
		    <li>
		     	<a href="{{$data['pinterest']}}" class="icon-pinterest"><i class="fa fa-pinterest"></i
                ></a>
		    </li>
		    @endif  
		    @if(isset($data['instagram']))
		    <li>
		     	<a href="{{$data['instagram']}}" class="icon-instagram"><i class="fa fa-instagram"></i
                ></a>
		    </li>
		    @endif  
		    @if(isset($data['vimeo']))
		    <li>
		     	<a href="{{$data['vimeo']}}" class="icon-vimeo">Vimeo</a>
		    </li>
		    @endif  
	     </ul>
	</div>
</div>
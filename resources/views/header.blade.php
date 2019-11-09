<div class="a1-bar a1-center" style="background-image: linear-gradient(to left, #93daf8 , white); width: 100%" >
    <div class="a1-half">
        <div class="a1-bar-item">
            <img src="resources/views/image/250px-Assam_Engineering_College_Logo.jpg" width="100px" height="100px" class="a1-margin a1-center">
        </div>
    </div>
    <div class="a1-half">
        <div class="a1-bar-item">
                    <span class="a1-margin"><b>CLASS TEST</b>
                        <p ><h4><b style="color: red;">DEPARTMENT OF COMPUTER APPLICATION</b></h4></p>
                    </span>

            @if(Session::has('message'))
                    <input type="text" class="a1-input a1-center" value="{{ Session::get('message') }}" style="color: white;background-color: red;">
             @endif
        </div>
    </div>
</div>
<h1>{{$Modo}} employer</h1>
<label for="Name"> Name </label>     
<input type="text" name="name" value="{{isset($employer->name)?$employer->name:''}}" id="name">
    <br>
    <label for="Email"> Email </label>  
    <input type="text" name="email" value="{{isset($employer->email)?$employer->email:''}}" id="email">
    <br>
    <label for="Website"> Website </label>  
    <input type="text" name="website" value="{{isset($employer->website)?$employer->website:''}}" id="website">
    <br>
    <label for="Logo"> Logo </label>  
    @if(isset($employer->logo))
    <img src="{{asset('storage').'/'.$employer->logo}}" width="100" >
    @endif
    <input type="file" name="logo" value="" id="logo">
    <br>
    <input type="submit" value="{{$Modo}}">
    <a href="{{url('employer')}}">Back</a>

    <br>

<h1>{{$Modo}} company</h1>
<label for="Name"> Name </label>     
<input type="text" name="name" value="{{isset($company->name)?$company->name:''}}" id="name">
    <br>
    <label for="Email"> Email </label>  
    <input type="text" name="email" value="{{isset($company->email)?$company->email:''}}" id="email">
    <br>
    <label for="Website"> Website </label>  
    <input type="text" name="website" value="{{isset($company->website)?$company->website:''}}" id="website">
    <br>
    <label for="Logo"> Logo </label>  
    @if(isset($company->logo))
    <img src="{{asset('storage').'/'.$company->logo}}" width="100" >
    @endif
    <input type="file" name="logo" value="" id="logo">
    <br>
    <input type="submit" value="{{$Modo}}">
    <a href="{{url('company')}}">Back</a>

    <br>

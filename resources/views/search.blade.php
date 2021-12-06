

<style>

/* input{
    background-color:rgba(0,0,0,0.5);
} */

input[type=text] {
  width: 60px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  border-radius: 15px;
  border: none;
  padding-left: 10px;      

}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
  width: 300px;
  border-radius: 15px;
  border: none;
  padding-left: 10px;  
}


</style>

<form action="{{route('search')}}" method="get">
    <input type="text" name="q" placeholder="Search...">
</form>

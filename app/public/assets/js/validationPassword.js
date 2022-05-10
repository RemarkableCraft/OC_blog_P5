function _id(name){
  return document.getElementById(name);
}
function _class(name){
  return document.getElementsByClassName(name);
}
_class("toggle-password1")[0].addEventListener("click",function(){
  _class("toggle-password1")[0].classList.toggle("active");
  if(_id("password1").getAttribute("type") == "password"){
    _id("password1").setAttribute("type","text");
  } else {
    _id("password1").setAttribute("type","password");
  }
});
_class("toggle-password2")[0].addEventListener("click",function(){
  _class("toggle-password2")[0].classList.toggle("active");
  if(_id("password2").getAttribute("type") == "password"){
    _id("password2").setAttribute("type","text");
  } else {
    _id("password2").setAttribute("type","password");
  }
});
_class("toggle-password")[0].addEventListener("click",function(){
  _class("toggle-password")[0].classList.toggle("active");
  if(_id("password").getAttribute("type") == "password"){
    _id("password").setAttribute("type","text");
  } else {
    _id("password").setAttribute("type","password");
  }
});





_id("password1").addEventListener("keyup",function(){
  let password = _id("password1").value;

  console.log(/[A-Z]/.test(password))
  
  if(/[A-Z]/.test(password)){
    _class("policy-uppercase")[0].classList.add("text-success", "fw-bold");
  } else {
    _class("policy-uppercase")[0].classList.remove("text-success", "fw-bold");
  }
  
  if(/[0-9]/.test(password)){
    _class("policy-number")[0].classList.add("text-success", "fw-bold");
  } else {
    _class("policy-number")[0].classList.remove("text-success", "fw-bold");
  }
  
  if(/[^A-Za-z0-9]/.test(password)){
    _class("policy-special")[0].classList.add("text-success", "fw-bold");
  } else {
    _class("policy-special")[0].classList.remove("text-success", "fw-bold");
  }
  
  if(password.length > 7){
    _class("policy-length")[0].classList.add("text-success", "fw-bold");
  } else {
    _class("policy-length")[0].classList.remove("text-success", "fw-bold");
  }
});
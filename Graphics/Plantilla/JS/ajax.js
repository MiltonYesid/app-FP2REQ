var idDiv       = "AnswerLogin";
var numbers     = "0123456789";
var letters     = "abcdefghijklmnñopqrstuvwxyz";
var conexion1;
var url         = "../Controllers/AnalystsController.php";
var urlhomeUsuario = "homeUsuario.php";
var nombrelog;
var emaillog;
function verificarFormulario(fname,lname,org,pos,mail,pass)
{
        //se llama el archivo controller del analista
        var fistname        = fname.value;
        var lastname        = lname.value;
        var organization    = org.value;
        var position        = pos.value;
        var email           = mail.value;
       
        var password        = pass.value;
            if(validar(fistname))
            {
                
                if(validar(lastname))
                {
                    if(validar(organization))
                    {
                         if(validar(position))
                        {
                                if(this.isEmailAddress(email))
                                    {
                                   if(password.length != 0)
                                       {
                                           crearAnalista(url,fistname,lastname,organization,position,email,password);
                                       }
                                       else
                                       {
                                           alert("the Password field is empty or contains numbers or is misspelled ");
                                       }
                                    }else
                                        {
                                            alert("the email field is empty or is bad write ");
                                        }
                          }
                     else{alert("the position field is empty or contains numbers ");}
                    }else{alert("the organization field is empty or contains numbers");}
                }else{alert("the Last name field is empty or contains numbers");}
            }else
            {alert("the first name field is empty or contains numbers");}
       // actualizar(url);
       
}
function login(email,password)
{
    var textemail = email.value;
    var textpass  = password.value;

        if(isEmailAddress(textemail))
        {
            if(textpass.toString().length != 0)
                {
                    this.nombrelog = textpass;
                    this.emaillog  = textemail;
                    buscarAnalista(url,textemail,textpass);
                }else
                    {
                        alert("the Password field is empty ");
                    }
        }else
            {
                alert("the email field is empty or is bad write ");
            }
}
function has_numbers(text){
   
   if(text.toString().length == 0)
       {
           return true
       }else
           {
   for(i=0; i<text.length; i++){
      if (numbers.indexOf(text.charAt(i),0)!=-1){
         return true;
      }
   }
   return false;
           }
}
function has_letters(text){
 text = text.toLowerCase();
 for(i=0; i<text.length; i++){
  if (letters.indexOf(text.charAt(i),0)!=-1){
    return true;
  }
 }
 return false;
}
function validar(text)
{
    if(!has_numbers(text))
        {
            if(has_letters(text))
            {
                return true;
            }
        }
}
function isEmailAddress(text)
{

var filter=/^[A-Za-z][A-Za-z0-9_.]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
if (text.length == 0 ) return false;
if (filter.test(text))
    {
   
return true;
    }
else
return false;
}
function crearAnalista(url,fname,lname,org,pos,email,pass)
{
    
  if(url=='')
  {
    return;
  }
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("GET", url.toString()+"?action=createAnalyst&fname="+fname+"&lname="+lname+"&org="+org+"&pos="+pos+"&email="+email+"&pass="+pass, true);
  conexion1.send(null);
}
function buscarAnalista(url,email,pass)
{
   
  if(url=='')
  {
    return;
  }
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange= busquedaAnalyst;
  conexion1.open("GET", url.toString()+"?action=getAnalyst&email="+email+"&pass="+pass, true);
  conexion1.send(null);
}
function procesarEventos()
{
  var detalles = document.getElementById("AnswerLogin");
  if(conexion1.readyState == 4)
  {
    detalles.innerHTML=conexion1.responseText;
  }
  else
  {
    detalles.innerHTML = '....LOADING....';
  }
}

function busquedaAnalyst()
{
  var detalles = document.getElementById("AnswerGetAnalyst");
  if(conexion1.readyState == 4)
  {
     detalles.innerHTML=conexion1.responseText;
      if(conexion1.responseText=="Incorrect")
          {
                    detalles.innerHTML= conexion1.responseText;
          }
          else
           {
  
               linkhomeUsuario="cabecera.php?pass="+conexion1.responseText+"&$otro";
               setTimeout (location.href=linkhomeUsuario, 10000);
           }
    
  }
  else
  {
    detalles.innerHTML = '....LOADING....';
  }
}

function redireccionar()
{
location.href = this.urlhomeUsuario.toString();
alert(this.urlhomeUsuario.toString());
//setTimeout ("redireccionar()",1000);
}



function crearXMLHttpRequest()
{
  var xmlHttp=null;
  if (window.ActiveXObject)
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else
    if (window.XMLHttpRequest)
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}

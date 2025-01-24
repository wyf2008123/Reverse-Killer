<script type="text/javascript">
function md(t){
  var arr = new Array();
  arr = t.split("nfas");
  t = arr.sort();
  var text = "";
  var i = "";
  for(i=0; i<t.length; i++)
  {
   if(text == ""){text = t[i];}else
{
text = text+"/n"+t[i];
}
  }
  document.title=text;
  document.getElementById("text").innerHTML = "<font color=red size='30'>"+text+"</font>";
}
</script>
<p id="text"></p>

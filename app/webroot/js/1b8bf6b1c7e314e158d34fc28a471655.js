$(document).ready(function () {$("#submit-1721731968").bind("click", function (event) {$.ajax({data:$("#submit-1721731968").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});});
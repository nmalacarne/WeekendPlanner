$(document).ready(function () {$("#submit-1926819993").bind("click", function (event) {$.ajax({data:$("#submit-1926819993").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});});
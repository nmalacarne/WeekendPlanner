$(document).ready(function () {$("#submit-499810545").bind("click", function (event) {$.ajax({data:$("#submit-499810545").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-469078156").bind("click", function (event) {$.ajax({data:$("#submit-469078156").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Fridaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-1606128288").bind("click", function (event) {$.ajax({data:$("#submit-1606128288").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Saturdaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-947370739").bind("click", function (event) {$.ajax({data:$("#submit-947370739").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Sundaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-1051454714").bind("click", function (event) {$.ajax({data:$("#submit-1051454714").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Mondaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});});
$(document).ready(function () {$("#submit-1050949666").bind("click", function (event) {$.ajax({data:$("#submit-1050949666").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-711731448").bind("click", function (event) {$.ajax({data:$("#submit-711731448").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Friday").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-86324834").bind("click", function (event) {$.ajax({data:$("#submit-86324834").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Saturday").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-1687935365").bind("click", function (event) {$.ajax({data:$("#submit-1687935365").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Sunday").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-432316147").bind("click", function (event) {$.ajax({data:$("#submit-432316147").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Monday").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});});
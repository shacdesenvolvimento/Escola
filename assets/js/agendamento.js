$(document).ready(function(){

	$(document).on("submit", "#cadastra_agendamento", function(e){
		e.preventDefault();
		salvarAgendamento();
	})
});

function salvarAgendamento(){
	$.ajax({
		url: "agendamento",
		type: "POST",
		dataType: "json",
		data: {
			cns: $("input[name=cns]").val(),
			nome: $("input[name=nome]").val()
		},
		success: function(response){
			let cor = 'success';
			if(response.status != 200 && response.status != 201){
				cor = 'danger';
			}
			notification(response.msg, 4000, cor);
		},
		error: function(request, status, error) {
			console.log(status);
			notification('Erro ao salvar os dados do agendamento.', 4000, 'danger');
		},
	})
}

function notification(msg, time, color){
	$.bootstrapGrowl(msg,{  
		type: color,  
		delay: time,  
	});
}
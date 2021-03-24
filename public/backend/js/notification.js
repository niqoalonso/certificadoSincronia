	function notifyDefault(message,type){
		$.growl({message:message},{
				type:type,allow_dismiss:false,
				label:'Cancel',
				className:'btn-xs btn-inverse',
				placement:{from:'bottom',align:'right'},
				delay:2500,animate:{enter:'animated fadeInRight',exit:'animated fadeOutRight'},offset:{x:30,y:30}
			});
	};

	function notify(align,icon,type, message){
        $.growl({icon:icon,message:message,url:''},
                {element:'body',type:type,allow_dismiss:true,placement:{align:align},offset:{x:30,y:30},spacing:10,z_index:999999,delay:2500,timer:1000,url_target:'_blank',mouse_over:false,icon_type:'class',template:'<div data-growl="container" class="alert" role="alert">'+
				'<button type="button" class="close" data-growl="dismiss">'+
				'<span aria-hidden="true">&times;</span>'+
				'<span class="sr-only">Close</span>'+
				'</button>'+
				'<span data-growl="icon"></span> '+
				'<span data-growl="message"></span>'+
				'<a href="#" data-growl="url"></a>'+
				'</div>'}
			);
	};

		
	

	// notifyDefault('Welcome to Notification page','inverse');

	// notify("right","fa fa-user","success", "mensaje");
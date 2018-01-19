var basic = {
	iframeurl: ['http://127.0.0.1:9000/index'],
	createiframe:function(){
		var  iurl = this.iframeurl;
		iurl.forEach(function(v,k){
			var createifr = document.createElement('iframe');
			createifr.src = v,createifr.style.display='none';
			document.body.appendChild(createifr);
		});
	}
};

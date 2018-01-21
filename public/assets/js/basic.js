var basic = {
	setiframeurl:function (iframeurl) {

    },
	createiframe:function(iframeurl){
        if( typeof iframeurl == 'string'){
            iframeurl = [iframeurl];
		}
		if(iframeurl instanceof Array){
            iframeurl.forEach(function(v,k){
                var createifr = document.createElement('iframe');
                createifr.src = v;
                createifr.style.display='none';
                document.body.appendChild(createifr);
            });
		}
	}
};


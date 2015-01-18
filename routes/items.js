var items = {
 
  getAll: function(req, res) {

  	if( req.body && req.body.json_data){
  		
  		var requestJson = req.body.json_data;
  		
  		var filteredItems = process_json(requestJson); // Spoof a DB call
    	res.json(filteredItems);	
  	}
    
  },
};
 

function process_json( requestJson ){

	var result 			= [];
	var return_result	= [];
	var data 			= JSON.parse(requestJson);
	var payload 		= data.payload;
	
	for( var i = 0; i < payload.length; i++ ) {

		if(payload[i].hasOwnProperty('drm') && payload[i].drm == true && payload[i].hasOwnProperty('episodeCount') &&  payload[i].episodeCount > 0 ) {
			result.push({
				image 	: payload[i].image.showImage, 
				slug	: payload[i].slug,
				title	: payload[i].title
			});
		}

  	}

  	return_result.push({
  		response: result
  	});

  	return return_result;
}
 
module.exports = items;
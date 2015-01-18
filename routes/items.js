var items = {
 
  getAll: function(req, res) {
  	console.log("reached items");
    var allitems = data; // Spoof a DB call
    res.json(allitems);
  },
};
 
var data = [{
  name: 'product 1',
  id: '1'
}, {
  name: 'product 2',
  id: '2'
}, {
  name: 'product 3',
  id: '3'
}];
 
module.exports = items;
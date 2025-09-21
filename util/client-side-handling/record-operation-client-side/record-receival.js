const record_receival_handling_func = (reg, func) => {
    console.log("Function dispatched...")
    if(reg && reg.length == 6) {
      fetch(`http://localhost/Aircraft_Fleet_Management/util/database_and_operation/operation/record-search.php?registration=${reg}`).then(
        response => {
          if(!response) {
            throw new Error ('Http operation failed')
          }
  
          return(response.json())
        }
      ).then(
        /*This block is the designated executing block for the imported function.*/
       data => {
        func(data);
       } 
      ).catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
    } else {
      fetch(`http://localhost/Aircraft_Fleet_Management/util/database_and_operation/operation/record-search.php`).then(
        response => {
          if(!response) {
            throw new Error ('Http operation failed')
          }
  
          return(response.json())
        }
      ).then(
       /*This block is the designated executing block for the imported function.*/
       data => {
        func(data);
       } 
      ).catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
    }
}

export default record_receival_handling_func;
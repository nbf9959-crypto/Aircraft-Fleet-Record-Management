import record_receival_handling_func from "./record-operation-client-side/record-receival.js";



const table_populating_handling = (collection) => {
  const table_body = document.querySelector(".dyanmic-item-row-container");

  table_body.innerHTML = '';

  collection.map((row) => {

    console.log(row.registration)

    const element = document.createElement('tr');
    element.className = "body-row-item";
    element.innerHTML = `
    <td class="body-column-item" scope="col"><a href="aircraft-fleet-management/record-view.php?registration=${row.registration}">${row.registration || "no registration"}</a></td>
    <td class="body-column-item" scope="col">${row.model || "no model"}</td>
    <td class="body-column-item" scope="col">${row.operating_Status || "no status"}</td>
    <td class="body-column-item" scope="col">${row.date_connected || "no date"}</td>
    <td id="delete-record-col-item" class="body-column-item" scope="col"><span id="record-deleting-element"  onclick="record_deletion_handling('N14106')">delete</span></td>
    `;

    table_body.appendChild(element)
  })
}

const exported_function = (data) => {
  const record_count_indicator = document.getElementById("record-result-indicating-element");
  record_count_indicator.innerText = `Record: ${data.result?.length}`;

  table_populating_handling(data.result);
}

record_receival_handling_func(null, exported_function);

const record_deletion_handling = (reg) => {
  console.log("The deletion function was dispatched.");
   fetch(`http://localhost/Aircraft_Fleet_Management/util/database_and_operation/operation/deletion.php?registration=${reg}`).then(
     response => {
       if(!response) {
         throw new Error ('Http operation failed')
       }

       return(response.json())
     }
   ).then(
    data => {
     record_receival_handling_func(null, exported_function);
    } 
   ).catch(error => {
     console.error('There was a problem with the fetch operation:', error);
   });
}

const querying_handling = () => {
 query_value = document.getElementById("query-search-inputting").value; 

 if(query_value) {
   console.log(query_value)
   record_receival_handling_func(query_value.toUpperCase(), exported_function);
 } else {
   alert("The input is invalid.")
 }
}

const testingFuc = () => {
  console.log("ueiafsjalcks");
}

const document_body_configuration = () => {
  const queryingButton = document.getElementById("query-search-btn");
  const record_element_deleting = document.getElementById("record-deleting-element");

  queryingButton.onclick = querying_handling;
  record_element_deleting.onclick = record_deletion_handling;
}

/*Tempoary solution due to the scoping level issue - not suitable for long term use */ 
document_body_configuration();

const table = {
  querying: querying_handling,
  deleting: record_deletion_handling,
  testing: record_receival_handling_func
}

export default table;

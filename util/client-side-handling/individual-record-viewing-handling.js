import record_receival_handling_func from "./record-operation-cilent-side/record-receival";

const get_registration_handling = () => {
    const urlStringValue = window.location.search;
    const params = new URLSearchParams(urlStringValue);

    let registration = params.get("registration"); 

    if(registration && registration.length === 6) {
        return registration 
    }
}

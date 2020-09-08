'use strict'

function Postday (){
  
  const hoy = new Date()
  const hoyMediaNoche= new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate())
  if (hoy.getDay()=== 1 || hoy.getDay()=== 2 || hoy.getDay()=== 3  || hoy.getDay()=== 4 || hoy.getDay() === 7){
    hoyMediaNoche.setDate(hoy.getDate() + parseInt(1));
  }  else if (hoy.getDay() === 5){
    hoyMediaNoche.setDate(hoy.getDate() + parseInt(3));
  } else {
    hoyMediaNoche.setDate(hoy.getDate() + parseInt(2));
  }
  const dia = hoyMediaNoche.getDate()
  const mes = hoyMediaNoche.getMonth()+1
  const ano = hoyMediaNoche.getFullYear()
  
 // suma un dia
  console.log(hoyMediaNoche.getDate())
  if(hoyMediaNoche.getDate()>9){
    return (String(ano)+"0"+String(mes)+String(dia))
    
  } else{
    return (String(ano)+"0"+String(mes)+"0"+String(dia))
  }
}
const diaparametro= Postday ()

function AclValidate(Charge, Delivery){
  if (isNaN(Charge)){//no number
  
  return(
    `<p>Faster?: Call us</p>`
  )}else{
    const ChargeInt= (parseInt(Charge))/100;
    const DeliveryString= String(Delivery)
    return(`
    <p>Delivery Date: ${DeliveryString.substr(0,4)}/${DeliveryString.substr(4,2)}/${DeliveryString.substr(6,2)}</p>
    <h3>Faster: ${ChargeInt} USD</h3><br>
    `)
  }
  }

function Answertemplate(data){
  const CrtCharge = (parseInt(data[0].totalCharges))/100
  const Crtdelivery =  String(data[0].deliveryDate)
  const StdCharge = (parseInt(data[2].totalCharges))/100
  const Stddelivery =  String(data[2].deliveryDate)
  const AclCharge = data[1].totalCharges
  const Acldelivery =  data[1].deliveryDate
  
  console.log (AclCharge)
  console.log (Acldelivery)
  console.log(typeof(Acldelivery))
  const AclValidateString= AclValidate (AclCharge, Acldelivery) 
  
  
  return (
    `<h2>Quote:</h2>
    <p>Delivery Date: ${Stddelivery.substr(0,4)}/${Stddelivery.substr(4,2)}/${Stddelivery.substr(6,2)}</p>
    <h3>Standar: ${StdCharge} USD</h3><br>
    <p>Delivery Date: ${Crtdelivery.substr(0,4)}/${Crtdelivery.substr(4,2)}/${Crtdelivery.substr(6,2)}</p>
    <h3>Critical: ${CrtCharge} USD</h3><br>
    ${AclValidateString}
    `
  )
}



const $form = document.getElementById("form");
console.log($form)

$form.addEventListener('submit', (event)=>{
  
  event.preventDefault(); //evita que recargue
  const $formLlenado= new FormData ($form)
  const $form_zipcode  = $formLlenado.get('form_zipcode')
  const $form_city  = $formLlenado.get('form_city')
  const $form_country  = $formLlenado.get('form_country')
  const $form_state  = $formLlenado.get('form_state')
 
 

  var data ={ //array jason
    login: {
      username: "storagecanopy",
      password: "yrc1234",
      busId: "78026298937",
      busRole: "Shipper",
      paymentTerms: "Prepaid"
      },
    details: {
      serviceClass: "ALL",
      typeQuery: "MATRX",
      pickupDate: diaparametro,
      productCode: "DFQ",
      acceptTerms: true
      },
    originLocation: {
      city: "Venus",
      state: "FL",
      postalCode: "33960",
      country: "USA",
      locationType: "COMM"    
      },
    destinationLocation: {
      city: $form_city,
      state: $form_state,
      postalCode: $form_zipcode,  
      country: $form_country,
      locationType: "COMM"  
      },
    listOfCommodities: {
      hazmatInd: false,
      poisonInd: false,
      commodity: [
        {
      
        handlingUnits: 1,
        packageCode: "SKD",
        packageLength: $form_length,
        packageWidth: $form_width,
        packageHeight: $form_height,
        weight: $form_weight
        }]
      },
    
  };
  
  console.log(diaparametro)
  fetch('https://api.yrc.com/node/api/ratequote',{
    method:'POST',
    body:JSON.stringify(data),
    headers:{
      "Content-type": "application/json; charset=UTF-8"//indicate that I send json post
    }
  }).then(res=>res.json())
  .then(recibido=>{
    console.log(recibido)
    var cargoTotal=recibido.pageRoot.bodyMain.rateQuote.quoteMatrix.table[0].transitOptions 
    console.log(cargoTotal)
    console.log($form_state)
    let htmlString = Answertemplate(cargoTotal)

    const $answer = document.getElementById("answer")
    $answer.innerHTML= htmlString
  })


  
})
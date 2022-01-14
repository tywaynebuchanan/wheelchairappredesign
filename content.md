//     function getData(){
//     fetch("js/select.json").then(res=>res.json())
//     .then(data =>{
//       const select = document.getElementById('condition');
//       const option = document.createElement('option');

//       option.innerHTML = `${data.disability}`;
//       select.appendChild(option);
//     })
        

// }


 const getData = async() =>{
        const dis_data = await fetch("js/select.json")
        if(dis_data.ok){
            const res = await dis_data.json();
            res.forEach(data =>{
                const condition = document.getElementById('condition');
                const option = document.createElement('option');
                option.innerHTML = `${data.disability}`;
                select.appendChild(option);
            })
        }

    }


    "Seizure Disorder","M.P.R","Microcephalus",
       "Severe Gastroesophageal Reflux Disease","Cornelius Delange Syndrome",
       "Cortical blindness","Mental/Physical Retardation","Scoliosis","Severe Constipation"
       ,"Down Syndrome","Global Development Delay","Intellectual Disability",
       "Severe Spastic Quadrpletia","Mild Respiratory Distress","Tinia Capitis",
       "Congenital Heart Disease"


         function getData(){
    fetch("js/select.json").then(res=>res.json())
    .then(data =>{
      const select = document.getElementById('condition');
      const option = document.createElement('option');

      option.innerHTML = `${data.disability}`;

      select.appendChild(option);
    })
        

}

getData();



 async function getData(){
                               const resdata = await fetch("js/select.json");
                               const resultdata = await resdata.json();
                               const condition = document.getElementById('condition');
                               const option = document.createElement('option');
                               resultdata.forEach(data =>{
                                        option.innerHTML = `${data.disability}`;
                                        condition.appendChild('option');
                               })
                           }
                           getData();
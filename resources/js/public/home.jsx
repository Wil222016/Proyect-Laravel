/* const { Modal } = require("bootstrap")
const { useEffect } = require("react")

Import React, {useEffect, useState } from 'react'
Import Config from '../Config'

const Home = () => {
    const[empresas, setEmpresas] = useState([])
    const[modal, setModal] = useState(false)
    const[datamodal, setDatamodal] = useState([])

    useEffect(()=>{
        getEmpresas()
    },[])
}

const getEmpresas = async()=>{
    const response = await Config.getEmpresas(5) 
    console.log(response)
    setEmpresas (response.data)
}

const search = async (e)=>{
    const response = await Config.searchEmpresas({text:e})
    setEmpresas (response.data)
}

const showModal = async (e,empresa)=>{
    e.preventDefault()
    setModal(true);
    setDatamodal(empresa);
}
 return(
    <div className="container pt-5 pb-5">
        <div className="row justify-content-center">
            <div className="col-sm-8">
                <h1 className="text-center fw-bolder">Directorio de empresas</h1>
                <div className="card mt-5">
                    <div className="card-body">
                        {
                            empresas.map((empresa)=>{
                                return(
                                    <div className="mt-3 key={empresa.id}">
                                        <div className="card body">
                                            <h2 className="fw-bolder">
                                                <a href="#" onClick={(e)=>showModal(e,empresa)}>{empresa.nombre}</a>

                                            </h2>
                                            <p>{empresa.descripcion}</p>

                                        </div>

                                    </div>
                                )
                            })
                        }
                        {modal && <Modal datamodal={datamodal} close={setModal}/>}

                    </div>

                </div>

            </div>

        </div>

    </div>

 )

 */
import React, { useState } from "react";

const Modal = ({ onSubmit, onClose, menu }) => {
    if (!menu) {
        return null;
    }

    const [numPeople, setNumPeople] = useState(1);

    const handleNumPeopleChange = (e) => {
        setNumPeople(parseInt(e.target.value, 10));
    };

    const incrementPeople = () => {
        setNumPeople((prev) => prev + 1);
    };

    const decrementPeople = () => {
        if (numPeople > 1) {
            setNumPeople((prev) => prev - 1);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch(
                "http://tu-servidor.com/api/reservations",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${tuToken}`, 
                    },
                    body: JSON.stringify({
                        date: new Date().toISOString(), 
                        num_people: numPeople,
                        total_amount: menu.price * numPeople,
                        receipt: "generar_recibo", 
                        status: "A", 
                        client_id: tuClientId, 
                        person_id: tuPersonId, 
                        menu_offered_id: menu.id,
                    }),
                }
            );

            if (response.ok) {
                const data = await response.json();
                onSubmit(data);
            } else {
                console.error(
                    "Error al procesar la reserva:",
                    response.statusText
                );
            }
        } catch (error) {
            console.error("Error en la solicitud:", error);
        }
    };

    return (
        <div
            className="modal"
            tabIndex="-1"
            role="dialog"
            style={{ display: "block" }}
        >
            <div className="modal-dialog" role="document">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">Detalles del Menú</h5>
                        <button
                            type="button"
                            className="btn-close"
                            onClick={onClose}
                        ></button>
                    </div>
                    <div className="modal-body">
                        <p>ID del Menú: {menu.id}</p>
                        <p>Precio: {menu.price}</p>
                        <form onSubmit={handleSubmit}>
                            <div className="mb-3">
                              <label htmlFor="numPeople" className="form-label">Numero de Personas</label>
                                <div>
                                    <button onClick={decrementPeople}>-</button>
                                    <span>{numPeople}</span>
                                    <button onClick={incrementPeople}>+</button>
                                </div>                                
                            </div>
                            <button type="submit" className="btn btn-primary">
                                Confirmar reserva
                            </button>
                        </form>
                    </div>
                    <div className="modal-footer">
                        <button
                            type="button"
                            className="btn btn-secondary"
                            onClick={onClose}
                        >
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Modal;

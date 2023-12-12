import React, { useState } from "react";
import { useNavigate } from "react-router-dom";

const ReservaModal = ({ datamodal, showReservaModal, onClose }) => {
  const [numPeople, setNumPeople] = useState(1);

  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();
    
    // Puedes realizar acciones con los datos, por ejemplo, enviarlos al servidor
    console.log("Número de personas:", numPeople);
    
    // Cerrar el modal
    onClose();
  };

  return (
    <div className="modal_bg" style={{ display: showReservaModal ? 'block' : 'none' }}>
      <div className="modal_content">
        <div className="modal_header">
          <h5 className="modal_title">Formulario de Reserva</h5>
          <button className="modal_close" onClick={onClose}>
            &times;
          </button>
        </div>
        <div className="modal_body">
          <form onSubmit={handleSubmit}>
            <div className="mb-3">
              <label htmlFor="numPeople">Número de personas:</label>
              <input
                type="number"
                id="numPeople"
                value={numPeople}
                onChange={(e) => setNumPeople(e.target.value)}
                required
              />
            </div>

            {/* Otros campos del formulario... */}

            <button type="submit" className="btn btn-primary">
              Hacer Reserva
            </button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default ReservaModal;

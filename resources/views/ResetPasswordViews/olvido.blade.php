<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Recuperar contraseña — Enviar correo</title>
  <style>
    :root{
      --bg: #0f1724;
      --card: #111827;
      --muted: #9ca3af;
      --accent: #06b6d4;
      --glass: rgba(255,255,255,0.04);
      font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }
    html,body{height:100%;margin:0;background:linear-gradient(180deg,var(--bg),#071029);color:#e6eef6}
    .wrap{min-height:100%;display:flex;align-items:center;justify-content:center;padding:32px}
    .card{
      width:100%;max-width:420px;background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border-radius:12px;padding:28px;box-shadow:0 6px 24px rgba(2,6,23,0.7);backdrop-filter: blur(6px);
      border:1px solid rgba(255,255,255,0.04);
    }
    h1{font-size:20px;margin:0 0 6px}
    p.lead{margin:0 0 18px;color:var(--muted);font-size:14px}

    form{display:flex;flex-direction:column;gap:12px}
    label{font-size:13px;color:var(--muted)}
    .field{
      display:flex;flex-direction:column;gap:6px
    }
    input[type="email"]{
      padding:12px 14px;border-radius:8px;background:var(--glass);border:1px solid rgba(255,255,255,0.04);
      color:inherit;font-size:15px;outline:none;transition:box-shadow .15s,border-color .15s
    }
    input[type="email"]:focus{box-shadow:0 6px 18px rgba(6,182,212,0.08);border-color:var(--accent)}

    .help{font-size:13px;color:var(--muted)}

    .actions{display:flex;gap:12px;align-items:center;justify-content:space-between;margin-top:8px}
    button{
      background:linear-gradient(90deg,var(--accent),#0ea5b8);border:none;color:#042028;padding:10px 14px;border-radius:10px;font-weight:600;cursor:pointer;font-size:15px
    }
    button:active{transform:translateY(1px)}
    .secondary{background:transparent;border:1px solid rgba(255,255,255,0.06);padding:8px 12px;border-radius:10px;color:var(--muted);font-size:14px}

    .notice{margin-top:14px;padding:10px;border-radius:8px;background:rgba(6,182,212,0.08);color:#bff0f6;font-size:14px;display:none}

    @media (max-width:460px){.card{padding:20px;border-radius:10px}}
  </style>
</head>
<body>
  <div class="wrap">
    <main class="card" role="main">
      <h1>Recuperar acceso</h1>
      <p class="lead">Introduce el correo asociado a tu cuenta y te enviaremos un enlace para restablecer la contraseña.</p>

      <form id="emailForm" action="#" method="post" novalidate>
        <div class="field">
          <label for="email">Correo electrónico</label>
          <input id="email" name="email" type="email" placeholder="tucorreo@ejemplo.com" required aria-required="true" />
          <div class="help">Usa el correo que registraste en tu cuenta.</div>
        </div>

        <div class="actions">
          <button type="submit">Enviar</button>
          <button type="button" class="secondary" id="cancelBtn">Cancelar</button>
        </div>

        <div id="notice" class="notice" role="status" aria-live="polite"></div>
      </form>
    </main>
  </div>

  <script>
    const form = document.getElementById('emailForm');
    const notice = document.getElementById('notice');
    const cancel = document.getElementById('cancelBtn');

    cancel.addEventListener('click', ()=>{
      form.reset();
      notice.style.display='none';
    });

    form.addEventListener('submit', (e)=>{
      e.preventDefault();
      const email = form.email.value.trim();
      if(!email){
        notice.textContent = 'Por favor ingresa un correo válido.';
        notice.style.display = 'block';
        notice.style.background = 'rgba(255,69,58,0.08)';
        notice.style.color = '#ffd8d5';
        return;
      }

      // Simulación de envío (aquí conectas con tu backend)
      notice.textContent = `Se ha enviado un correo a ${email} con instrucciones para restablecer tu contraseña.`;
      notice.style.display = 'block';
      notice.style.background = 'rgba(6,182,212,0.08)';
      notice.style.color = '#bff0f6';

      // Opcional: limpiar formulario después de 2.5s
      setTimeout(()=>{
        form.reset();
      },2500);
    });
  </script>
</body>
</html>

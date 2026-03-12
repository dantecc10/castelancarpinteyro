import asyncio
import random

# Colores para la terminal
COLOR_PROD = "\033[94m" # Azul
COLOR_CONS = "\033[92m" # Verde
COLOR_RESET = "\033[0m"

async def productor(id, cola, cerrojo):
    """Genera items y los coloca en la cola."""
    for i in range(5):
        # Una simulación del tiempo de producción
        await asyncio.sleep(random.uniform(0.1, 0.5))
        item = f"Dato-{id}-{i}"
        
        # ZONA CRÍTICA
        async with cerrojo:
            await cola.put(item)
            print(f"{COLOR_PROD}Productor {id}: [+] Agregué {item} (Cola: {cola.qsize()}){COLOR_RESET}")

async def consumidor(id, cola, cerrojo):
    """Saca items de la cola y los procesa."""
    while True:
        # Simulamos espera antes de consumir
        await asyncio.sleep(random.uniform(0.5, 1.2))
        
        # ZONA CRÍTICA
        async with cerrojo:
            item = await cola.get()
            print(f"{COLOR_CONS}Consumidor {id}: [-] Procesé {item} (Cola: {cola.qsize()}){COLOR_RESET}")
            cola.task_done()

async def main():
    cola = asyncio.Queue(maxsize=10) # Límite de la zona crítica
    cerrojo = asyncio.Lock() # El candado solicitado

    # Crear tareas (3 productores y 2 consumidores)
    productores = [asyncio.create_task(productor(i, cola, cerrojo)) for i in range(3)]
    consumidores = [asyncio.create_task(consumidor(i, cola, cerrojo)) for i in range(2)]

    # Esperar a que los productores terminen
    await asyncio.gather(*productores)

    # Esperar a que la cola se vacíe
    await cola.join()

    # Cancelar consumidores
    for c in consumidores:
        c.cancel()

    print("\nSimulación Finalizada")

if __name__ == "__main__":
    asyncio.run(main())

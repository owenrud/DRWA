using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI1.Models;

namespace WebAPI1.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class KelasController : ControllerBase
    {
        private KelasContext _context;

        public KelasController(KelasContext context) { this._context = context; }
        //GET/API/KELAS
        [HttpGet]
        public ActionResult<IEnumerable<KelasItem>> GetSiswaItems()
        {
            _context = HttpContext.RequestServices.GetService(typeof(KelasContext)) as KelasContext;
            return _context.GetAllSiswa();
        }
        //GET/API/KELAS/ID
        [HttpGet ("{id}", Name="GET")]
        public ActionResult<IEnumerable<KelasItem>> GetSiswaItems(string id)
        {
            _context = HttpContext.RequestServices.GetService(typeof(KelasContext)) as KelasContext;
            return _context.GetSiswa(id);
        }
    }
}

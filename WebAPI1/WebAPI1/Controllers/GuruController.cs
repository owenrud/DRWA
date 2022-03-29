using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI1.Models;

namespace WebAPI1.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class GuruController : ControllerBase
    {
        private GuruContext _context;

        public GuruController(GuruContext context) { this._context = context; }
        //GET/API/KELAS
        [HttpGet]
        public ActionResult<IEnumerable<GuruItem>> GetGuruItems()
        {
            _context = HttpContext.RequestServices.GetService(typeof(GuruContext)) as GuruContext;
            return _context.GetAllGuru();
        }
        //GET/API/KELAS/ID
        [HttpGet ("{id}", Name="GET_Guru")]
        public ActionResult<IEnumerable<GuruItem>> GetGuruItems(string id)
        {
            _context = HttpContext.RequestServices.GetService(typeof(GuruContext)) as GuruContext;
            return _context.GetGuru(id);
        }
        //POST/API/KELAS/
        [HttpPost]
        public ActionResult<GuruItem> AddGuru([FromForm]string rfid, [FromForm] string nip, [FromForm] string nama_guru,
            [FromForm] string alamat, [FromForm] string status)
        {
            GuruItem gi = new GuruItem();
            gi.rfid = rfid;
            gi.nip = nip;   
            gi.nama_guru = nama_guru;
            gi.alamat = alamat;
            gi.status_guru = status;

            _context = HttpContext.RequestServices.GetService(typeof(GuruContext)) as GuruContext;
            return _context.AddGuru(gi);
        }
    }
}

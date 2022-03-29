using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI1.Models;

namespace WebAPI1.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class JadwalController : ControllerBase
    {
        private JadwalContext _context;

        public JadwalController(JadwalContext context) { this._context = context; }
        //GET/API/KELAS
        [HttpGet]
        public ActionResult<IEnumerable<JadwalItem>> GetJadwalItems()
        {
            _context = HttpContext.RequestServices.GetService(typeof(JadwalContext)) as JadwalContext;
            return _context.GetAllJadwal();
        }
        //GET/API/KELAS/ID
        [HttpGet("{id}", Name = "GET_Jadwal")]
        public ActionResult<IEnumerable<JadwalItem>> GetJadwalItems(string id)
        {
            _context = HttpContext.RequestServices.GetService(typeof(JadwalContext)) as JadwalContext;
            return _context.GetJadwal(id);
        }
        //GET/API/KELAS/ID
        [HttpGet("Guru/{id_guru}", Name = "GET_JadwalNIP")]
        public ActionResult<IEnumerable<JadwalItem>> GetJadwal_IDGURU_Items(string id_guru)
        {
            _context = HttpContext.RequestServices.GetService(typeof(JadwalContext)) as JadwalContext;
            return _context.GetJadwalByNIP(id_guru);
        }
        //GET/API/KELAS/ID
        [HttpGet("Mapel/{id_mapel}", Name = "GET_JadwalMAPEL")]
        public ActionResult<IEnumerable<JadwalItem>> GetJadwal_IDMAPEL_Items(string id_mapel)
        {
            _context = HttpContext.RequestServices.GetService(typeof(JadwalContext)) as JadwalContext;
            return _context.GetJadwalByMapel(id_mapel);
        }
        //POST/API/KELAS/
        [HttpPost]
        public ActionResult<JadwalItem> AddGuru([FromForm] string tahun, [FromForm] string sms, [FromForm] int id_guru,
            [FromForm] string hari, [FromForm] int id_kelas, [FromForm] int id_mapel, [FromForm] string jamMulai, [FromForm] string jamSelesai)
        {
            JadwalItem ji = new JadwalItem();
            ji.thn_ac = tahun;
            ji.sms = sms;
            ji.id_guru = id_guru;
            ji.hari = hari;
            ji.id_kelas = id_kelas;
            ji.id_mapel = id_mapel;
            ji.jamMulai = jamMulai;
            ji.jamSelesai = jamSelesai;
           

            _context = HttpContext.RequestServices.GetService(typeof(JadwalContext)) as JadwalContext;
            return _context.AddJadwal(ji);
        }
    }
}

using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace doan.Models
{
    public class NhanVienModel
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        [Display(Name = "Mã nhân viên")]
        
        public int maNV { get; set; }

        [Display(Name = "Tên nhân viên")]
        [StringLength(50, ErrorMessage = "Tên nhân viên phải <50 kí tự ")]
        public string tenNV { get; set; }

        [Display(Name = "Giới tính")]
        public int gioiTinh { get; set; }


        [Display(Name = "Ngày sinh")]
        [DisplayFormat(DataFormatString = "{0:dd-MM-yy}", ApplyFormatInEditMode = true)]
        public DateTime ngaySinh { get; set; }

        [Display(Name = "Địa chỉ")]
        [StringLength(50, ErrorMessage = "Địa chỉ phải <50 kí tự ")]
        public string diaChi { get; set; }

        [Display(Name = "SDT")]
        public string sDT { get; set; }
        [Display(Name = "CCCD")]
        [StringLength(12, ErrorMessage = "Địa chỉ phải 12 kí tự ")]
        public string cccd { get; set; }
        [Display(Name = "Ngày vào làm")]
        [DisplayFormat(DataFormatString = "{0:dd-MM-yy}", ApplyFormatInEditMode = true)]
        public DateTime ngayVaoLam { get; set; }

        [Display(Name = "Chức vụ")]
        [StringLength(30, ErrorMessage = "chứ vụ phải <30 kí tự ")]
        public string chucVu { get; set; }
        [Display(Name = "Lương")]
        public double luong { get; set;  }
       
        public ICollection<HoaDonModel> HoaDons { get; set; }
    }
}

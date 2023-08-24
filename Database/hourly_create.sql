USE [turnstile]
GO

/****** Object:  Table [dbo].[hourly]    Script Date: 8/23/2023 8:23:11 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[hourly](
	[item] [int] IDENTITY(1,1) NOT NULL,
	[date] [date] NOT NULL,
	[time] [time](7) NOT NULL,
	[ride] [text] NOT NULL,
	[units] [int] NOT NULL,
	[cycles] [int] NULL,
	[empty] [int] NULL,
	[hourly] [int] NOT NULL,
	[wait] [int] NULL,
 CONSTRAINT [PK_hourly] PRIMARY KEY CLUSTERED 
(
	[item] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

ALTER TABLE [dbo].[hourly] ADD  CONSTRAINT [DF_hourly_units]  DEFAULT ((1)) FOR [units]
GO


